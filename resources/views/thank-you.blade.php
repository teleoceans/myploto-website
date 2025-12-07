@extends('layouts.web')
@section('title', 'Thank You')

<style>
.jumbotron{
min-height: 80vh !important;
}
</style>
@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;" style="min-height: 460px;"
   data-top-bottom="background-size: 110%;">
   <div class="container pb-4" >
      <!-- jumbo-heading -->
      <div class=" text-center" style="text-align: center !important; 
      color: #fff !important;
      padding-bottom: 60px;" data-aos="fade-up">
         <h1 style="color: #fff; text-shadow: 3px 3px rgba(0, 0, 0, 0.8);">Thank you!</h1>
         <!-- Breadcrumbs -->
         <h2 style="color: #fff; text-shadow: 3px 3px rgba(0, 0, 0, 0.8);">We Appreciate Your Business!</h2>
            <p>
               Thank you for choosing us. We hope our services meet your expectations.
            </p>
            <p>
               If you have any feedback or need further assistance, please don't hesitate to <a href="{{ route('pages.contact') }}">contact us</a>.
            </p>
           
         <!-- /breadcrumb -->
         <a href="{{ route('pages.services', 1) }}" class="btn btn-primary mt-4">Book Another Service</a>
         <br><br><br>
      </div>
      <!-- /jumbo-heading -->
   </div>
   <!-- /container -->
</div>
<!-- /jumbotron -->

@endsection