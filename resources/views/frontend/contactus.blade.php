@extends('frontend.master')
@section('content')
<section class="contact-top-area py-5">
  <div class="container">
     <div class="row">
        <div class="col-lg-12">
            <div class="contact-top-tittle text-center">
                <h2 class="py-3">Contact us to give a project or just <br>
                    say hello!</h2>
                <p class="py-3">If you want to launch your business online and <br>
                    increase your business sales then you are coming to the right place. How can we help you?<br>
                    Contact us for free without any hassle</p>
            </div>
        </div>
     </div>
  </div>
</section>
<section class="py-5">
    <div class="container contact-bg-shadow p-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-left-area ">
                    <h5>Contact us</h5>
                    <h2>Customer Support<br>
                        Contact Our Team<br>
                        Feel free to talk about
                        anything.</h2>
                    <div class="contact-info-area">
                        <div class="contact-info-text py-2">
                           <p><i class="fa-solid fa-location-dot me-3"></i>Phulpur,Mymensingh,Bangladesh</p> 
                        </div>
                        <div class="contact-info-text py-2">
                            <p><i class="fa-solid fa-phone"></i>
                                +8801706972285</p> 
                         </div>
                         <div class="contact-info-text py-2">
                            <p><i class="fa-regular fa-envelope"></i>
                                contact@pointssoft.com</p> 
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="contact-form">
                        <div class="mb-4">
                            <input type="text" class="form-control" name="name"  placeholder="Name" >
                          </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
                          </div>
                          <div class="mb-4">
                            <input type="number" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone">
                          </div>
                          <div class="mb-4">
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5" placeholder="Question"></textarea>
                          </div>
                          <div class="submit-btn mb-4 text-end">
                            <button type="submit">Submit</button>
                          </div>
                    </div>
                </form>
                @if($message=Session::get('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

               
            </div>
        </div>
    </div>
</section>
@endsection