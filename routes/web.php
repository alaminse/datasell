<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\websiteSettingController;
use App\Http\Controllers\Dashboard\OrderManageController;
use App\Http\Controllers\Dashboard\InventoryController;
use App\Http\Controllers\Dashboard\PostControler;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/singlepost/{slug}', [HomeController::class, 'singlepost'])->name('single.post');
Route::get('/singleproduct/{id}', [HomeController::class, 'singleProduct'])->name('single.product');
Route::post('/contact-store', [HomeController::class, 'contactstore'])->name('contact.store');


Auth::routes();
//user


//Dashboad Route
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function () {

    Route::resource('categories', CategoryController::class);

    Route::controller(ProductController::class)
        ->prefix('products')
        ->as('products.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{category}', 'show')->name('show');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::post('/update/{category}', 'update')->name('update');
            Route::get('/destroy/{category}', 'destroy')->name('destroy');
            Route::get('/status/{category}', 'status')->name('status');
        });


    // Route::get('/', [ProductController::class, 'index'])->name('add.product');
    // Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/all-product', [ProductController::class, 'allproduct'])->name('all.product');
    // Route::get('/product-edit/{id}', [ProductController::class, 'productedit'])->name('product.edit');
    // Route::post('/product-update/{id}', [ProductController::class, 'productupdate'])->name('product.update');
    // Route::get('/product-remove/{id}', [ProductController::class, 'productremove'])->name('product.remove');
});

 Route::group(['prefix'=>'random','middleware' => ['role:admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::get('/manage-order', [OrderManageController::class, 'manageorder'])->name('manage.order');

    // Route::post('/order-store/{id}', [OrderManageController::class, 'orderStore'])->name('order.store');
    Route::get('/manage-inventory', [InventoryController::class, 'index'])->name('manage.inventory');
    Route::post('/inventory-store', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory-edit{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::post('/inventory-update{id}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::get('/invetiry-trash{id}', [InventoryController::class, 'trash'])->name('invetiry.trash');
    // Route::get('/ssss', [ProductController::class, 'productremove'])->name('store.inventory');
    Route::get('/allcontact', [ProductController::class, 'allcontact'])->name('all.contact');
});

 Route::group(['middleware' => ['role:user']], function () {
       Route::get('/users', [UserController::class, 'index'])->name('user.index');
       Route::get('/manageaccount', [UserController::class, 'manageaccount'])->name('manage.account');
       Route::get('/download-product/{id}', [UserController::class, 'productdownload'])->name('download.product');
       Route::get('/replace-product/{id}', [UserController::class, 'productreplace'])->name('replace.product');
       Route::post('/order-store/{id}', [UserController::class, 'orderStore'])->name('order.store');
       //  Route::post('/problem-file', [UserController::class, 'problemfile'])->name('problem.file');

        Route::get('/user', [UserController::class, 'index']);


  });
//   Route::get('/problemfile', function(){return "hello";});
Route::post('/file-problem/{id}',[UserController::class, 'problemfile'])->name('problem.file');







//search
Route::post('/search', [HomeController::class, 'search'])->name('search');



//website settings
Route::get('/website-setting', [websiteSettingController::class, 'websiteSeeting'])->name('website.setting');
Route::post('/setting-store', [websiteSettingController::class, 'settingstore'])->name('setting.store');
//post manage
Route::get('/post', [PostControler::class, 'postindex'])->name('post.index');
Route::post('/post-store', [PostControler::class, 'poststore'])->name('post.store');
Route::get('/all-post', [PostControler::class, 'allpost'])->name('allpost');
Route::get('/post-edit/{id}', [PostControler::class, 'postedit'])->name('post.edit');
Route::post('/post-update/{id}', [PostControler::class, 'postupdate'])->name('post.update');
Route::get('/post-remove/{id}', [PostControler::class, 'postremove'])->name('post.remove');


// Route::get('/creatRoll', function(){
//     $role = Role::create(['name' => 'user']);
//     return $role->name;
// });




