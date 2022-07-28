<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>
        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{url('frontend')}}/css/bootstrap.css" rel="stylesheet">
        <!-- slick -->
        <link href="{{url('frontend')}}/css/slick.css" rel="stylesheet">
        <!-- prettrphoto -->
        <link href="{{url('frontend')}}/css/prettyPhoto.css" rel="stylesheet">
        <!-- animate -->
        <link href="{{url('frontend')}}/css/animate.css" rel="stylesheet">
        <!-- Main -->
        <link href="{{url('frontend')}}/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper" class="homepage-3">
            <!-- wrapper -->
            <div id="header">
                <!-- header -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="logo">
                                <a href="{{url('')}}">
                                    <img src="{{url('frontend')}}/images/lg3.png" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <div class="main-navigation">
                                <!-- menu -->
                                <nav class="navbar navbar-default">
                                    <div>
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <li class="active">
                                                    <a href="{{url('')}}">Home</a>
                                                </li>
                                                <li class="active">
                                                <a>@if(Auth::user())
                                                {{Auth::user()->name}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('blog')}}">Blog</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('blog/create')}}">Create Blog</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('blog/category')}}">Category</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('blog/category/create')}}">Create Category</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('logout')}}">Logout</a>
                                                </li>
                                                @else
                                                <li class="dropdown">
                                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{url('register')}}">Register</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{url('login')}}">Login</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <!-- menu -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header -->