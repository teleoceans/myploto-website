@extends('layouts.web')
@section('title', 'Thank You')

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container">
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Thank You</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Thank You</li>
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
<div class="page">
   <div class="container block-padding">
      <div class="row">
         <div class="col-lg-12 text-center">
            <h2>We Appreciate Your Business!</h2>
            <p>
               Thank you for choosing us. We hope our services meet your expectations.
            </p>
            <p>
               If you have any feedback or need further assistance, please don't hesitate to <a href="{{ route('pages.contact') }}">contact us</a>.
            </p>
            <a href="{{ route('pages.home') }}" class="btn btn-primary mt-4">Return to Home</a>
         </div>
      </div>
   </div>
   <!-- /container -->
</div>
<!-- /page content -->

@endsection
