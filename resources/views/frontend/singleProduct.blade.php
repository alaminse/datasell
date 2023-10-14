@extends('frontend.master')
@section('content')
 <section class="single-product-area py-5">
    <div class="container">
        <div class="row g-0">
           <div class="col-lg-12">
             <div class="single-product-title d-flex gap-2 align-items-center">
                <div class="single-product-image">
                    <img src="{{asset($product->product_image)}}" width="60px" height="60px"/>
                 </div>
                 <div>
                    <h5>{{$product->product_name}}</h5>
                </div>
                 </div>
             </div>
        </div>
        <div class="row py-5">
            <div class="col-lg-4">
               <div class="single-product-left bg-white rounded-3 p-4">
                  <div class="single-product-price d-flex justify-content-between">
                     <p>Price per piece:</p>
                     <h5>${{$product->product_price}}</h5>
                  </div>
                  <div class="single-product-price d-flex justify-content-between py-3">
                    <p>Goods in stock:</p>
                    <h5>pcs {{$product->product_pcs}} </h5>
                 </div>
                 <hr/>
                 <div class="buy-now text-end">
                    <button type="submit" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Buy</button>
                </div>
               </div>
               
            </div>
            <div class="col-lg-8 ps-3">
                 <div class="product-description">
                     <h3>Product description</h3>
                     <p>{!!$product->product_description!!}</p>
                     <h3>Account recommendations:</h3>
                     <p>When working with accounts, be sure to use a proxy;What are proxies and how to configure them can be found here;Test a small number of accounts before buying a largebatch;General recommendations for working with accounts here</p>
                 </div>
            </div>
        </div>
    </div>
 </section>

 <section> 

  
 </section>
@endsection