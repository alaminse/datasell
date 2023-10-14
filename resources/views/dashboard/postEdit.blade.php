@extends('layouts.app')
@section('content')
@if($message=Session::get('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{$message}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif                 
 <section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="add-product-area">
                    <div class="d-flex justify-content-between">
                        <h2>Update post</h2>
                        <a href="{{route('allpost')}}">All Post</a>
                    </div>
                    
                    <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Post Name</label>
                          <input type="text" class="form-control" id="postName" name="post_name" value="{{$post->post_name}}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Post Image</label>
                          <input type="file" class="form-control-file" id="postImage" name="post_image">
                          <img src="{{asset($post->post_image)}}" height="150" width="150">
                        </div>
                       
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Post Description</label>
                            <textarea id="editor" class="form-control" rows="6" name="post_description">{{$post->post_description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update post</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection