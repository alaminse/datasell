<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostControler extends Controller
{
    public function postindex(){
        return view('dashboard.addNewPost');
    }
    public function poststore(Request $request){

            $imageurl='';
            $post_image                                 =$request->file('post_image');
            $imagetype                                  =$post_image->getClientOriginalExtension();
            $imageName                                  =time().'.'.$imagetype;
            $directory                                  ='postimage/';
            $post_image ->move($directory,$imageName);
            $imageurl=$directory.$imageName;
            $post=new Post();
            $post->post_name                            =$request->post_name;
            $post->slug                                 = str_replace(" ", "-",$request->post_name);
            $post->post_image                           =$imageurl;
            $post->post_description                     =$request->post_description;
            $post->save();
            return redirect('/all-post')->with('message','Post Create Successfully');
        
             
    }
    public function allpost(){
        $posts=Post::all();
        return view('dashboard.allPost',['posts'=>$posts]);
    }
    public function postedit($id){
         $post=Post::find($id);
         return view('dashboard.postEdit',['post'=>$post]);
    }
    public function postupdate(Request $request){
        $post=Post::find($request->id);
        $imageurl='';
    
     if($post_image=$request->file('post_image')){
         $imagetype=$post_image->getClientOriginalExtension();
         $imageName=time().'.'.$imagetype;
         $directory='postimage/';
         $post_image->move($directory,$imageName);
         $imageurl=$directory.$imageName;

     }
     else{
         $imageurl=$post->post_image;
     }
     
     $post->post_name                =       $request->post_name ;
     $post->post_image               =       $imageurl;
     $post->post_description         =       $request->post_description;
     $post->save();
     return redirect('/all-post')->with('message','post Update Successfully');

    }

    public function postremove($id){
      $post=Post::find($id);
      $post->delete();
      return redirect('/all-post')->with('message','post delete Successfully');
    }
}
