@extends('layouts.web')
@section('title', 'Download Our App')

@section('content')
<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Download Our App</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Download</li>
            </ol>
         </nav>
         <!-- /breadcrumb -->
      </div>
      <!-- /jumbo-heading -->
   </div>
   <!-- /container -->
</div>
<!-- /jumbotron -->
<div class="container-fluid block-padding bg-light">
    <div class="text-center mb-5">
        <h2>IOS \ Android</h2>
        <a href="https://apps.apple.com/us/app/my-ploto/id6449781027" target="_blank"><img style=" width: 220px; margin-left: 30px" src="{{ url('/') }}/img/apple_store.png"></a>
         <a href="https://play.google.com/store/apps/details?id=net.myploto.myploto" target="_blank"><img style="width: 220px" src="{{ url('/') }}/img/play_store.png"></a>
    </div>
    <div class="container">
        <!-- features -->
        <div class="row text-lg-right">
            <div class="col-md-6 col-lg-3">
                @foreach($s1 as $s_1)
                <!-- feature -->
                <div class="feature-with-icon">
                    <div class="icon-features">
                        <!-- icon -->
                        <img style="width: 80px" src="services/{{ $s_1->image }}">
                    </div>
                    <h5><strong>{{ $s_1->name }}</strong></h5>
                    <p style="font-size: 12px">{{ $s_1->description }}</p>
                </div>
                <!-- /feature-with-icon-->
                @endforeach
            </div>
            <div class="col-md-6 col-lg-3 text-left pt-3 pt-sm-0 order-lg-12">
                <!-- feature -->
                @foreach($s2 as $s_2)
                <!-- feature -->
                <div class="feature-with-icon">
                    <div class="icon-features">
                        <!-- icon -->
                        <img style="width: 80px" src="services/{{ $s_2->image }}">
                    </div>
                    <h5><strong>{{ $s_2->name }}</strong></h5>
                    <p style="font-size: 12px">{{ $s_2->description }}</p>
                </div>
                <!-- /feature-with-icon-->
                @endforeach
                <!-- /feature-with-icon-->
            </div>
            <!-- /col-l -->
            <div class="text-center col-lg-5 mx-auto mt-3">
                <!--image  -->
                <img alt="" class="img-fluid rounded aos-init aos-animate" src="img/features.jpg" data-aos="flip-right">
                <div class="feature-with-icon">
                    <div class="icon-features">
                        <!-- icon -->
                        <img style="width: 80px" src="services/{{ $s3->image }}">
                    </div>
                    <h5><strong>{{ $s3->name }}</strong></h5>
                    <p style="font-size: 12px">{{ $s3->description }}</p>
                </div>
            </div>
            <!-- col-lg-7  -->
        </div>
        <!-- /row-->
    </div>
    <!-- /container -->
</div>

@endsection