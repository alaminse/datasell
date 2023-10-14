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
                     <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Website Logo</label>
                          <input type="file" class="form-control-file" id="postImage" name="website_logo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Website Favicon</label>
                            <input type="file" class="form-control-file" id="postImage" name="website_favicon">
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection