@extends('frontend.master')
@section('content')
 
 <section class="py-5">
    <div class="container py-3">
        <div clas="row">
           <div class="col-lg-12">
              <div class="single-post-area">
                 <div class="post-details">
                    <h2>{{$post->post_name}}</h2>
                    <img src="{{asset($post->post_image)}}"/>
                    <p>{!!$post->post_description!!}</p>
                 </div>
                 <div class="post-image"></div>
                 <div class="post-description"></div>
              </div>
            </div> 
        </div>
    </div>
 </section>
 <!---PAGE TITTLE END-->
 
@endsection