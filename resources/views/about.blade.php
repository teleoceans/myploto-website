@extends('layouts.web')
@section('title', 'About Us')

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>About us</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">About us</li>
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
            <h2>Who are we?</h2>
            <p>
            MyPloto is a pet caring service provider located in Dubai with a solid vision to build a strong and 
            unique brand in the pet service provider market in all United Arab Emirates, and invading this market in 
            Dubai as a start till we footprint all United Arab Emirates with our qualified services and create a mother 
            brand that would be immediately identifiable and establish a sense of trust with all our customers.
            </p>

            <h2>What we offer?</h2>
            <ol style="padding-left: 30px">
               <li>Pet Grooming</li>
               <li>Pet Day Care</li>
               <li>Pet Setting</li>
               <li>Pet Taxi</li>
               <li>Pet Training</li>
               <li>Pet Walking</li>
               <li>Pet Boarding</li>
            </ol>
            <p>
            All services have variety of packages either (hourly or per session or by different monthly memberships)
            our professional team will make sure that your pet will always get the highest level of carness as we treat
             them as if they are our own in a very friendly and warm environment for your pets.
            </p>

            <h2>Goal and Objective</h2>
            <ul>
               <li>Establish a category dominance.</li>
               <li>Increase our customer's segmentation.</li>
               <li>Creating a niche for our services in each home across all U.A.E.</li>
               <li>Increase our market's profit margin by having a new place and increasing our offered services.</li>
               <li>Have a strong and memorable brand personality by enhancing our service, team and lowering their budget.</li>
            </ul>
            
            <!-- Buttons -->
            <a href="{{ route('pages.contact') }}" class="btn btn-primary mt-4">Contact us</a>
            <a href="{{ route('pages.services', 1) }}" class="btn btn-secondary mt-4 ml-1">Book Now</a>
         </div>
         <!-- /col-lg-6-->
         <div class="col-lg-6">
         <h2>Our Mission</h2>
            <p>
            To provide innovative, high-quality, 100 % compliance, cost-effective, and pet-friendly health care 
            that will entice your pet to return time and time again.
            </p>

            <h2>Our Vision</h2>
            <p>
            We adore animals and believe that they help us become better people. MyPloto is a reliable partner 
            for pet parents and their pets at all times.
            </p>
            <img src="{{ url('/') }}/img/introimg1.jpg">
         </div>
      </div>
      <!-- /row -->
   </div>
   <!-- /container-->
  <!-- Section  -->
  @include('partials._counter')
   <!-- /section ends-->
@endsection