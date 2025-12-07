@extends('layouts.web')
@section('title', 'Short Description')

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Short Description</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Short Description</li>
            </ol>
         </nav>
         <!-- /breadcrumb -->
      </div>
      <!-- /jumbo-heading -->
   </div>
   <!-- /container -->
</div>
<!-- /jumbotron -->
<!-- ==== Page Content ==== -->
<div class="page" style="padding-bottom: 0">
   <div class="container block-padding no-bg-small">
      <!--row -->
      <div class="row pb-3">
         <div class="col-lg-6">
            <h2>Short Description</h2>
            <p>
            MyPloto: The ultimate pet services platform. Find trusted caregivers, groomers, and trainers for your beloved furry companions. Simplify pet care with ease!
            </p>
            <!-- Buttons -->
            <a href="{{ route('pages.contact') }}" class="btn btn-primary mt-4">Contact us</a>
            <a href="{{ route('pages.services', 1) }}" class="btn btn-secondary mt-4 ml-1">Book Now</a>
         </div>
         <!-- /col-lg-6-->
        
      </div>
      <!-- /row -->
   </div>
   <!-- /container-->
  <!-- Section  -->
  @include('partials._counter')
   <!-- /section ends-->
@endsection