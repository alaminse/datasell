<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>all2z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!---Header AREA START--->
    <section>
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <!-- website logo -->
                <a class="navbar-brand" href="#">
                    <a href="http://localhost/mailsell/public/"> <img src="{{ asset('assets/images/websitelogo.png') }}"
                            style="max-width: 160px" /></a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- navbar -->
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/mailsell/public">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/mailsell/public/about-us">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/mailsell/public/blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/mailsell/public/contact-us">Contact</a>
                        </li>
                    </ul>
                    <!-- search -->
                    <div class="search">
                        <form action="{{ url('/search') }}" method="POST" role="search" class="d-flex">
                            @csrf
                            <select class="form-select">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="product.." name="search" />
                                <div class="search-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- login -->
                    <div class="m-auto">
                        <div class="dropdown">
                            <button class="btn btn-success" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Login/Register
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- <div class="row align-items-center">
                <div class="col-lg-1">
                    <div class="header-logo">
                        <a href="http://localhost/mailsell/public/"> <img
                                src="{{ asset('assets/images/websitelogo.png') }}" /></a>

                    </div>
                </div>
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse top-menu" id="navbarSupportedContent">
                                <ul class=" navbar-nav mx-auto mb-2 mb-lg-0">
                                    <li><a href="http://localhost/mailsell/public">Home</a></li>
                                    <li><a href="http://localhost/mailsell/public/about-us">About</a></li>
                                    <li><a href="http://localhost/mailsell/public/blog">Blog</a></li>
                                    <li><a href="http://localhost/mailsell/public/contact-us">Contact</a></li>

                                </ul>
                                <div class="header-search">
                                    <form action="{{ url('/search') }}" method="POST" role="search" class="d-flex">
                                        @csrf
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" placeholder="product.." name="search" />
                                        <div class="search-btn">
                                            <button type="submit">Search</button>
                                        </div>
                                    </form>

                                </div>
                                <ul class="top-menu-icon  d-flex ">
                                    <div class="dropdown">
                                        <button class="user-login-btn" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Login/Register
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                                            <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>

                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

            </div> --}}
    </section>
    <!---Header AREA END--->
    @yield('content')
    <!--FOOTER WIDGET START-->
    <section class="footer-widget-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="widget-link">
                        <h2>Quick Link</h2>
                        <ul class="footer-menu">
                            <li><a href="http://localhost/mailsell/public/#">Home</a></li>
                            <li><a href="http://localhost/mailsell/public/about-us">About</a></li>
                            <li><a href="http://localhost/mailsell/public/contact-us">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-link">
                        <h2>Other Link</h2>
                        <ul class="footer-menu">
                            <li><a href="#">Terms and Condation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-link">
                        <h2>Quick Contact</h2>
                        <ul class="footer-menu">
                            <li><a href="#">+888017–85</a></li>
                            <li><a href="#">all2z@gmail.com</a></li>
                            <li><a href="#">+8807–85(whats up)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-link">
                        <h2>Follows us</h2>
                        <ul class="footer-menu d-flex gap-3">
                            <li><a href="#"><i class="fa-brands fa-facebook facebok-bg"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter twitter-bg"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin linkdin-bg"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-skype skype-bg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FOOTER WIDGET END-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
