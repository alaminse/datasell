<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Orders;
use Illuminate\Support\Str;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    public function manageorder(){
         $orders=Orders::all();
        return view('dashboard.manageOrder',['orders'=>$orders]);
    }
  

    
}
