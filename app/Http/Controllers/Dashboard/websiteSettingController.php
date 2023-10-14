<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Sitesetting; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class websiteSettingController extends Controller
{
    public function websiteSeeting(){
        return view('dashboard.websiteSetting');
    }
    public function settingstore(Request $request){
        $imageurl='';


        $site_logo                  =$request->file('website_logo');
        $imagetype                  =$site_logo  ->getClientOriginalExtension();
        $imageName                  =time().'.'.$imagetype;
        $directory                  ='sitelogo/';
        $site_logo ->move($directory,$imageName);
        $imageurl=$directory.$imageName;

        $logo=new Sitesetting();
        $logo->site_logo            =   $imageurl;
        
         $logo->save();
        return redirect()->back()->with('message','logo upload Successfully');
    }
}
