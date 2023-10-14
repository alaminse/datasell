@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="all-product-tittle">
                    |<div class="d-flex justify-content-between">
                        <h3 class="py-4">All Posts</h3>
                        <div class="new-product-btn">
                            <a href="{{route('post.index')}}">Add new Post</a>
                        </div>
                    </div>
                 <hr/>
                    <div class="all-product-table py-4">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">SI</th>
                                <th scope="col">Post Name</th>
                                <th scope="col">Post Image</th>
                                <th scope="col">Post Description</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <th scope="row">1</th>
                                     <td>{{$post->post_name}}</td>
                                     
                                    
                                     <td><img src="{{asset($post->post_image)}}" height="150" width="150"></td>
                                     <td>{!! $post->post_description !!}</td>
                                     <td>
                                         
                                         <a href="{{route('post.edit',['id'=>$post->id])}}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                         <a href="{{route('post.remove',['id'=>$post->id])}}"><i class="fa-solid fa-trash-can"></i></a>
                                     </td>
                                   </tr>
                                @endforeach
                              </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection