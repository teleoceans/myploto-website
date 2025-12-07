<nav id="main-nav" class="navbar-expand-xl fixed-top">
        <div>
        <!-- Start Top Bar -->
        <div class="container-fluid top-bar" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <!-- Start Contact Info -->
                    <ul class="contact-details float-left">
                        <li style="padding: 0"><a title="Facebook" href="https://www.facebook.com/My.Ploto.Pet.Services.UAE.2/"><i class="fab fa-facebook-f"></i></a></li>
                        <li style="padding: 0"><a  title="Instagram" href="https://www.instagram.com/myploto/"><i class="fab fa-instagram"></i></a></li>
                        <li style="padding: 0"><a  title="TikTok" href="https://www.tiktok.com/@myploto"><i class="fab fa-tiktok"></i></a></li>
                        <li style="padding: 0"><a  title="SnapChat" href="https://www.snapchat.com/add/myploto?sender_web_id=d5cc3316-0867-47fa-8419-f51b9714c91e&device_type=desktop&is_copy_url=true"><i class="fab fa-snapchat"></i></a></li>

                        <li><i class="fa fa-map-marker"></i><a href="https://goo.gl/maps/PCeUCJyq5Jj43C25A" target="_blank">{{ ENV('ADDRESS') }}</a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:{{ ENV('SUPPORT_EMAIL') }}">{{ ENV('SUPPORT_EMAIL') }}</a></li>
                        <li><i class="fa fa-phone"></i>{{ ENV('PHONE_NUMBER') }}</li>
                    </ul>
                    <!-- End Contact Info -->
                    <!-- Start Social Links -->
                    <ul class="social-list float-right list-inline" style="padding-top: 7px">
                        @if(!Auth::check())
                            <li class="list-inline-item" id=""><a href="{{ route('pages.login') }}">Login</a></li>
                            <li class="list-inline-item" id=""><a href="{{ route('register') }}">| Register</a></li>
                        @else
                            <li class="list-inline-item" style="color: #fff;">Welcome, {{ Auth::user()->name }} | </li>
                            <li class="list-inline-item" id=""><a href="{{ route('pages.my-account') }}">My Orders</a></li>
                            <li class="list-inline-item" id=""><a href="#"
                             onclick="document.getElementById('logout-form').submit();">| Logout</a></li>
                             <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
                        @endif
                    </ul>
                    <!-- /End Social Links -->
                    </div>
                    <!-- col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- End Top bar -->
        <!-- Navbar Starts -->
        <div class="navbar container-fluid">
            <div class="container ">
                <!-- logo -->
                <a class="nav-brand" href="{{ route('pages.home') }}">
                <img src="/img/logo.png" alt="" class="img-fluid">
                </a>
                <!-- Navbartoggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                <i class="fas fa-bars"></i>
                </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- menu item -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="{{ route('pages.home') }}">Home</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Request::is('services') ? "active" : "" }}" href="{{ route('pages.services', 1) }}">Book Now</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link  {{ Request::is('download') ? "active" : "" }}" href="{{ route('pages.download') }}">Download App</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link  {{ Request::is('blog/articles') ? "active" : "" }}" href="{{ route('pages.blog') }}">Blog</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Request::is('about-us') ? "active" : "" }}" href="{{ route('pages.about') }}">About Us</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Request::is('contact-us') ? "active" : "" }}" href="{{ route('pages.contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <!--/ul -->
                </div>
                <!--collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar -->
    </div>
    <!--/row -->
</nav>


