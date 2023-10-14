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
            <div class="col-lg-8 ">
                <h1 class="inventory-title py-4">Edit Inventory</h1>
                <div class="invetory-store">
                    <form method="POST" action="{{route('inventory.update',['id'=>$inventory->id])}}">
                      @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                            <input type="text" class="form-control" value="{{$inventory->product->product_name}}" name="product_id"/>
                         </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Order Product</label>
                            
                                <input type="text" class="form-control" value="{{$inventory->order_id}}" name="product_order"/>
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">data</label>
                            <textarea class="form-control" id="exampleFormControlSelect1" name="data">{{$inventory->data}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Order Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                              <option value="0">Prossing</option>
                              <option value="1">Complete</option>
                            </select>
                          </div>
                          <div class="form-group">
                            
                            <button class="btn btn-primary" type="submit">Update</button>
                          </div>
                    </form>
                </div>
               
            </div>
            
           
        </div>
    </div>
</section>
@endsection