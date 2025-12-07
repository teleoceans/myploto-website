<!doctype html>
<html class="no-js" lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>

        <!-- end demo_changer -->      <!-- Preloader  -->
        <div id="preloader">
            <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="preloader-logo">
                    <!--logo -->
                    <img src="img/logo.png" alt="" class="img-fluid">
                    <br>
                    <!--preloader circle -->
                    <div class="lds-ring">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <!--/preloader logo -->
            </div>
            <!--/row -->
            </div>
            <!--/container -->
        </div>
        <!--/Preloader ends -->

        @include('partials._header')
        @yield('content')


        <!-- footer-area -->
        @include('partials._footer')
        <!-- footer-area-end -->




        <!-- JS here -->
        @include('partials._script')
    </body>

</html>


