@extends('layouts.app')

@section('content')
<section>
  <div class="container">
    <div class="row">
        <div class="col-lg-3">
           <div class="dashboard-card">
            <i class="fa-solid fa-users py-4"></i>
            <h6>Daily Visitor</h6>
            <h5>5000</h5>
           </div>
        </div>
        <div class="col-lg-3">
          <div class="dashboard-card">
            <i class="fa-brands fa-first-order-alt py-4"></i>
           <h6>Total Order</h6>
           <h5>105</h5>
          </div>
       </div>
       <div class="col-lg-3">
        <div class="dashboard-card">
          <i class="fa-solid fa-chart-line py-4"></i>
          <h6>Conversation Rate</h6>
         <h5>10%</h5>
        </div>
     </div>
     <div class="col-lg-3">
      <div class="dashboard-card">
       <i class="fa-solid fa-users py-4"></i>
       <h6>Avarege Order</h6>
       <h5>45</h5>
      </div>
   </div>
    </div>
</div>
</section>
<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h4>Total Sale</h4>
        <div class="sales-chart bg-white p-5">
          <canvas id="salesChart"></canvas>
        </div>
        
      </div>
      <div class="col-lg-4">
        <h4>Visitor Source</h4>
        <div class="sales-chart bg-white p-5">
          <canvas id="visitorChart"></canvas>
         
        </div>
      </div>
    </div>
   
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
         <div class="latest-order">
           <h3>Latest order</h3>
           <table class="table table-bordered">
            <thead>
              <tr>
               <th scope="col">Order No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Report</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">#1133</th>
                <td>Vpn Mail</td>
                <td>$700</td>
                <td class="badge badge-pill badge-warning">Pending</td>
                <td>
                <div class="dropdown">
                    <a class="fa-solid fa-ellipsis-vertical " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Complete</a>
                      <a class="dropdown-item" href="#">Edit</a>
                      <a class="dropdown-item" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">#1139</th>
                <td>Code Mail</td>
                <td>$500</td>
                <td class="badge badge-pill badge-success">Delivered</td>
                <td>
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
              </tr>
              <tr>
                <th scope="row">#1153</th>
                <td>2022 Mail</td>
                <td>$1000</td>
                <td class="badge badge-pill badge-danger">Cancelled</td>
                <td>
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
              </tr>
            </tbody>
          </table>
         </div>
      </div>
    </div>
  </div>
</section>

@endsection
