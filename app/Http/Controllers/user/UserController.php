<?php

namespace App\Http\Controllers\user;
use Carbon\Carbon;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use File;
use ZipArchive;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $orders = Orders::where('user_id', auth()->id())->get();
        return view('user.index',['orders' => $orders]);
    }

    public function manageaccount(){
        return "account manage";
    }

    public function orderStore(Request $request,$id){
        
        // return $request->all();
        // if($request->coupon_code != ''){
        //     $discountPrice = (10/ 100) * $request->total_price;
        //     $totalPrice = $request->total_price - $discountPrice;
        // }
        // return $request->all();
       $order=new Orders();
       $order->product_id             = $id;
       $order->order_uid              = random_int(100, 999);
       $order->user_id                = Auth::user()->id;
       $order->email                  = $request->email;
       $order->status                 = 0;
       $order->payment_method         = $request->payment;
       $order->quantity               = $request->quantity;
       $order->amount                 = $request->total_price;
       $order->sub_amount             = $request->total_price;
       $order->discount               = 0;
       $order->coupon_code            = 'coupon_code';
       $order->save();
       return redirect()->away('https://merchant.binance.com/en/docs/functionalities/payment-links');
    }
    public function problemfile(Request $request,$id){
          $order=Orders::find($id);
        
        $fileurl='';


        $problem_file                      =$request->file('problem_file');
        $filetype                          =$problem_file->getClientOriginalExtension();
        $fileName                          =time().'.'.$filetype;
        $directory                         ='problem-file/';
        $problem_file->move($directory,$fileName);
        $fileurl=$directory.$fileName;
        
        $order->problem_file           =$fileurl;
         $order->save();
         return redirect()->back()->with('message','your problem file uploaded successfully ');
        // return redirect('user')->back()->with('message','problem file upload Successfully');
    }
    public function productdownload($id){
        $zip = new ZipArchive();

        $DelFilePath= Str::random(15).".zip";
        if(file_exists(public_path('/downloadFile/').$DelFilePath)) {
            unlink(public_path('/downloadFile/').$DelFilePath);
        }
        if ($zip->open(public_path('/downloadFile/').$DelFilePath, ZIPARCHIVE::CREATE) == TRUE) {
            $zip->addFromString('codemail.txt','email download file');
           

            $zip->close();
        }
            // $zip->addFile("file_path","file_name");

            $headers = array('Content-Type: application/zip, application/octet-stream');
        return response()->download(public_path("/downloadFile/".$DelFilePath,$DelFilePath))->deleteFileAfterSend(true);

    }
    // public function productreplace($id){
    //     $zip = new ZipArchive();

    //     $DelFilePath= Str::random(15).".zip";
    //     if(file_exists(public_path('/productreplace/').$DelFilePath)) {
    //         unlink(public_path('/productreplace/').$DelFilePath);
    //     }
    //     if ($zip->open(public_path('/productreplace/').$DelFilePath, ZIPARCHIVE::CREATE) == TRUE) {
    //         $zip->addFromString('replace.txt','You get image screenshorts');
           

    //         $zip->close();
    //     }
    //         // $zip->addFile("file_path","file_name");

    //         $headers = array('Content-Type: application/zip, application/octet-stream');
    //     return response()->download(public_path("/productreplace/".$DelFilePath,$DelFilePath))->deleteFileAfterSend(true);

    // }
    
}
