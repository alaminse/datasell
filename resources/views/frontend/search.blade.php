@extends('frontend.master')
@section('content')
 
 <!---HERO AREA END-->
 
 
 <!--PRODUCT GRID AREA START-->
 <section id="product-grid py-5 product-shadow  rounded-3">
     
    <div class="container ">
        <!--product header start--->
        <div class="row  align-items-center py-2">
            <div class="col-lg-6">
                <div class="product-info-title">
                    <h2>Gmail: Autoreg</h2>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="product-pcs-title">
                    <p>availability, pcs.</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="pice-price">
                    <p>price per piece</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="product-image">
                    <img src="{{asset('assets/images/product.png')}}" width="57px" heighr="57px"/>
                </div>
            </div>
         </div>
        </div>
         <div class="container product-itam-bg rounded-3 p-4">

            @foreach ($allProducts as $product)
          

            
            
            <div class="row  align-items-center py-2 px-4 product-bottom-border py-2">
                <div class="col-lg-6">
                    <div class="product-image-area d-flex gap-3 align-items-center">
                        <div class="product-image">
                            <a href="{{route('single.product',['id'=>$product->id])}}">
                                <img src="{{asset($product->product_image)}}" width="60px" height="60px"/>
                            </a>
                        </div>
                        <div class="product-item-content">
                            <a href="{{route('single.product',['id'=>$product->id])}}">{{$product->product_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="product-pcs-title">
                        <p class="text-center">{{$product->product_pcs}} Pcs</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="pice-price">
                        <p class="text-center">$ {{$product->product_price}} </p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="buy-now">
                        <button  data-bs-target="#exampleModalToggle{{$product->id}}"  data-bs-toggle="modal">Buy</button>
                    </div>
                </div>
                <!--Buy Now Modal Start-->
                <div class="modal fade" id="exampleModalToggle{{$product->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          
                          <button  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="product-supplier d-flex justify-content-between">
                              <h4>Supplier selection</h4>
                              <p>Step 1 / 2</p>
                           </div>
                           <div class="modal-product-info pt-4">
                            <div class="product-image-area d-flex gap-3 align-items-center">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{asset($product->product_image)}}" width="60px" height="60px"/>
                                    </a>
                                </div>
                                <div class="product-item-content" >
                                    <a href="#">{{$product->product_name}}</a>
                                </div>
                            </div>
                           </div>
                           <hr/>
                           <div class="product-details-table">
                             <form  action="{{route('order.store',['id'=>$product->id])}}" method="POST">
                                @csrf
                                <table class="table">
                                    <thead>
                                      <tr>
                                       
                                        <th scope="col">Provider</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">per piece</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       
                                      <tr>
                                       
                                        <td>#{{$product->product_uid}}</td>
                                        <td>{{$product->product_pcs}}</td>
                                        <td>${{$product->product_price}}</td>
                                        <td>
                                            <div class="counter ">
                                                <span class="down" onClick='decreaseCount(event, this, "{{$product->product_price}}", "totalprice{{$product->id}}", "total{{$product->id}}")'>-</span>
                                                <input type="number" name="quantity" readonly value="1">
                                                <span class="up" onClick='increaseCount(event,this, "{{$product->product_price}}", "totalprice{{$product->id}}", "total{{$product->id}}")'>+</span>
                                              </div>
                                        </td>
                                      </tr>
                                         
                                     
                                      <tr>
                                        <td colspan="2" id="product-title">Preliminary order amount,<br> excluding commissions</td>
                                        <td colspan="2" class="text-end" id="product-price">
                                            
                                             <strong id="totalprice{{$product->id}}">
                                                {{$product->product_price}}
                                            </strong>
                                            
                                            $<input type="hidden" id="total{{$product->id}}" value="{{$product->product_price}}"  name="total_price">
                                            </td> 
                                      </tr>
                                      <tr>
                                        <div class="row py-3">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="payment">
                                                    <option selected>Payment Method</option>
                                                    <option value="paypal">Paypal</option>
                                                    <option value="bikash">Bikash</option>
                                                    <option value="rocket">Rocket</option>
                                                    <option value="dutch-bangla">Dutch Bangla</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col">
                                              <input type="email" class="form-control" placeholder="email" name="email">
                                            </div>
                                          </div>
                                          <div class="row py-3">
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Enter Discount Copun" name="coupon_code">
                                            </div>
                                          </div>
                                      </tr>
                                      <tr>
                                        <td colspan="4" class="text-end">
                                            <div class="buy-now">
                                                <button type="submit" data-bs-toggle="modal" id="buyNow" data-bs-target="#payModal">Pay</button>
                                            </div>
                                        </td>
                                        
                                      </tr>
                                 </tbody>
                                  </table>

                            </form> 
                             <!---product suees message start-->
                             @if($message=Session::get('message'))
                             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 {{$message}}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               @endif  
                             <!---product suees message end-->
                           </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                <!--Buy Now Modal End-->
                

                 
             </div>
            
            @endforeach
            
            
             
         </div>
    </section>
 <!--PRODUCT GRID AREA END-->
 
@endsection