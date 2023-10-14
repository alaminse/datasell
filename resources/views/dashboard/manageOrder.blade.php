@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Manage All Order</h2>
                <div class="order-filter-area py-3">
                  <form method="post" action="" class="d-flex gap-3">
                    <div class="w-25 mr-3">
                        <select class="form-control">
                            <option>Action</option>
                            <option value="1">Trash</option>
                            <option value="2">Complete</option>
                            <option value="3">Pending</option>
                          </select>
                     </div>
                    <div class="w-25 mr-3">
                        <select class="form-control">
                            <option>All Dates</option>
                            <option value="1">All Dates</option>
                            <option value="2">jun 2023</option>
                        </select>
                     </div>
                    <div class="w-25 mr-3">
                        <select class="form-control">
                            <option>Register Customer</option>
                        </select>
                    </div>
                    <div class="w-25">
                       <button type="submit" class="btn btn-primary">Filter</button>
                     </div>
                  </form>
                </div>
                <div class="admin-order-manage">
                    <table class="table table-borderless">
                        <thead class="py-3">
                            <tr>
                                <th>Select</th>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Billing</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                       
                                      </div>
                                </td>  
                                <td>#{{$order->order_uid}}</td>
                                <td> {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                                <td class="processing">
                                   Processing</td>
                                <td>Mirpur,Dhaka</td>
                                <td>${{$order->amount}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="fa-solid fa-ellipsis-vertical " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">Complete</a>
                                          <a class="dropdown-item" href="#">Processing</a>
                                          <a class="dropdown-item" href="#">Pending</a>
                                          <a class="dropdown-item" href="#">Deliver</a>
                                          <a class="dropdown-item" href="#">Cancel</a>
                                        </div>
                                      </div>
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