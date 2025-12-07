@extends('layouts.web')
@section('title', 'Book Now!')

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Book Now!</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
         </nav>
         <!-- /breadcrumb -->
      </div>
      <!-- /jumbo-heading -->
   </div>
   <!-- /container -->
</div>
<!-- /jumbotron -->
@include('partials._book')
<!-- /section ends-->
@endsection