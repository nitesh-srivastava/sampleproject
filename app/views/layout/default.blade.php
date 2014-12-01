<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Sample Laravel Project</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/custom.css" rel="stylesheet">
        @yield('styles')
    </head>

    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Sample Project</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/user/">View Users</a></li>
                                <li><a href="/user/create">Register User</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container main-container" role="main">
            @yield('content')
        </div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div id="social-media-menu" >
                            <nav class="menu">
                                <ul>
                                    <li><a href="https://www.facebook.com/enjoyye" title="Facebook" class="social-slide facebook"></a></li>
                                    <li><a href="https://plus.google.com/u/0/b/109082662657903912555/109082662657903912555/posts/p/pub" title="Google Plus" class="googleplus social-slide"></a></li>
                                    <li><a href="https://twitter.com/enJOYYEusa" title="Twitter" class="social-slide twitter"></a></li>
                                    <!--<li><a href="https://www.pinterest.com/enjoyyeusa/boards/" title="PInterest" class="pinterest social-slide"></a></li>-->
                                    <li><a href="https://instagram.com/enjoyyeusa" title="Instagram" class="instagram social-slide"></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-6 footer-menu-outer">
                        <div id="footer-menu" class="text-right">
                            <nav>
                                <li><a href="">Home</a></li>
                                <li class="divider-vertical">|</li>
                                <li><a href="#">About</a></li>
                                <li class="divider-vertical">|</li>
                                <li><a href="#">Contact</a></li>
                            </nav>
                        </div>
                        <div class="footer-copyright text-right">
                            &copy; Copyright 2014 SourceFuse. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
            <script src="/assets/js/jquery.2.1.1.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
            @yield('scripts')
        </div>

    </body>
</html>
