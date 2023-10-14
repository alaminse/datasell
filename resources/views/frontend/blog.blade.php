@extends('frontend.master')
@section('content')
 <!---PAGE TITTLE START-->
 <section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-us-title text-white text-center py-5">
                    <h2>Our Blog</h2>
                    
                </div>
            </div>
        </div>
    </div>
 </section>
 <section class="py-5">
    <div class="container py-3">
        <div clas="row">
            <h3>All Posts</h3>
            <hr/>
        </div>
        
        <div class="row py-3 my-3">
          @foreach ($posts as $post)
          <div class="col-lg-3 my-3">
              <div class="card">
                 <a href="http://localhost/mailsell/public/singlepost">
                   <img src="{{asset($post->post_image)}}" class="card-img-top" alt="..." width="304" height="203">
                  </a> 
                  <div class="card-body">
                    <h5 class="card-title blog-title">
                      <a href="{{route('single.post',['slug'=>$post->slug])}}">{{$post->post_name}}</a>
                    </h5>
                    <p class="card-text">
                      {!! \Illuminate\Support\Str::limit($post->post_description, 150, $end='...') !!}
                    </p>
                    <a href="{{route('single.post',['slug'=>$post->slug])}}" class="read-more">Read More</a>
                  </div>
                </div>
          </div>
          @endforeach
      </div>
  </div>
 </section>
 <!---PAGE TITTLE END-->
 
@endsection