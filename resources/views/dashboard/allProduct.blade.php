@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="all-product-tittle">
                    |<div class="d-flex justify-content-between">
                        <h3 class="py-4">All Product</h3>
                        <div class="new-product-btn">
                            <a href="{{route('add.product')}}">Add new Product</a>
                        </div>
                    </div>
                 <hr/>
                    <div class="all-product-table py-4">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">SI</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Pcs</th>
                                <th scope="col">Price</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($allProducts as $product)
                                <tr>
                                    <th scope="row">1</th>
                                     <td>{{$product->product_name}}</td>
                                     <td>{{$product->product_pcs}}</td>
                                     <td>{{$product->product_price}}</td>
                                    
                                     <td><img src="{{asset($product->product_image)}}" height="150" width="150"></td>
                                     <td>{!! $product->product_description !!}</td>
                                     <td>
                                         
                                         <a href="{{route('product.edit',['id' =>$product->id])}}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                         <a href="{{route('product.remove',['id'=>$product->id])}}"><i class="fa-solid fa-trash-can"></i></a>
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