@extends('frontend.master')
@section('content')
 <!---PAGE TITTLE START-->
 <section class="about-us-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-us-title text-white text-center py-5">
                    <h2>ABOUT US</h2>
                    <p>Your Success, Our Hands</p>
                </div>
            </div>
        </div>
    </div>
 </section>
 <!---PAGE TITTLE END-->
 <!--ABOUT US CONTENT SECTION 1 START-->
  <section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-us-content">
                    <h2>About Us</h2>
                    <p>The idea to start the GoldenZonefx project, which was initially called Ziskejucet.cz, began in 2014 in a small Prague office where a handful of young daytraders, including the future founders, joined their forces. You can see us in the picture on the left. We were contributing to each other’s trading system as well as bringing up different ideas about money and risk management.

                        Despite our different approaches to trading, we mutually agree that professionalism can only be achieved through strong discipline in observing one’s own rules. By maintaining rigorous self-discipline, one reaches a point where team spirit and unobtrusive supervision of other traders form the backbone of conscientious and successful trading.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-image">
                    <img src="{{asset('assets/images/aboutimage1.jpg')}}"/>
                </div>
            </div>
        </div>
    </div>
 </section>
 <!--ABOUT US CONTENT SECTION 1 END-->
 <!--ABOUT US CONTENT SECTION 2 START-->
 <section class="py-5">
    <div class="container py-3">
        <div class="row">
            
            <div class="col-lg-6">
                <div class="about-us-image">
                    <img src="{{asset('assets/images/about-us2.jpg')}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-content">
                    <h2>Our Mission</h2>
                    <p>We are continuously developing the project into an international investment company. This change will allow us to create a global platform where, at a certain point, we will be able to offer a unique composition of retail traders trading for our company to investors with the possibility to invest in a portfolio of traders of their choice.

                        Let’s get together to create a global community of successful retail traders and build an investment portfolio that has no precedent in the world.
                        
                        as bringing up different ideas about money and risk management.</p>
                </div>
            </div>
        </div>
    </div>
 </section>
 <!--ABOUT US CONTENT SECTION 2 END-->
@endsection