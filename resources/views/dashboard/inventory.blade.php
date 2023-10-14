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
                <h1 class="inventory-title py-4">Add New Inventory</h1>
                <div class="invetory-store">
                    <form method="POST" action="{{route('inventory.store')}}">
                      @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                          
                            <select class="form-control" id="exampleFormControlSelect1" name="product_id">
                             @foreach($products as $product)
                              <option value="{{$product->id}}">{{$product->product_name}}</option>
                              @endforeach 
                             </select>
                            
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">data</label>
                            <textarea class="form-control" id="exampleFormControlSelect1" name="data"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Order Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                              <option value="0">Prossing</option>
                              <option value="1">Complete</option>
                            </select>
                          </div>
                          <div class="form-group">
                            
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                    </form>
                </div>
               
            </div>
            <hr/>
            <div class="col-lg-12 py-4">
                <div class="all-invetory">
                    <h2>All Inventory</h2>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SI</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product order</th>
                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($inventories as $inventory)
                          <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>{{$inventory->product->product_name}}</td>
                            <td>{{$inventory->order_id}}</td>
                            <td>{{$inventory->data}}</td>
                            <td>{{$inventory->status}}</td>
                            <td>
                              <a href="{{route('inventory.edit',['id'=>$inventory->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="{{route('invetiry.trash',['id'=>$inventory->id])}}"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                          </tr>
                          @endforeach
                         
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection