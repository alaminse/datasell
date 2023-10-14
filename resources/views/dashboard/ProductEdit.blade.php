@extends('layouts.app')
@section('content')
 <section>
   
    @if($message=Session::get('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="add-product-area">
                    <h2>Update product</h2>
                    <form action="{{route('product.update',['id' =>$product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Product Name</label>
                          <input type="text" class="form-control" id="productName" name="product_name" value="{{$product->product_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="productPcs" class="form-label">Product pcs</label>
                            <input type="number" class="form-control" id="productName" name="product_pcs" value="{{$product->product_pcs}}">
                          </div>
                          <div class="mb-3">
                            <label for="productPrice" class="form-label">Per pcs Price</label>
                            <input type="number" class="form-control" id="productPrice" name="product_price" value="{{$product->product_price}}">
                          </div>
                         <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Product Image</label>
                          <input type="file" class="form-control-file" id="productImage" name="product_image">
                          <img src="{{asset($product->product_image)}}" width="150px" height="150px"/>
                        </div> 
                       
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Description</label>
                            <textarea id="editor" class="form-control" rows="6" name="product_description">{{$product->product_description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update product</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection