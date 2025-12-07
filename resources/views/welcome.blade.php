@extends('layouts.web')
@section('title', 'Home Page')

@section('content')
   @include('partials._slider')
   @include('partials._services')
   <!-- /section-->
   <!-- section -->
   <section id="intro-home" class="container-fluid bg-light pattern4-right">
      <div class="container">
         <!-- row -->  
         <div class="row">
            <div class="col-lg-9">
               <h3>Quality & Experience </h3>
               <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
            </div>
            <!-- /col-lg-->
            <div class="col-lg-3 justify-content-center align-self-center">
               <!-- button -->
               <a href="contact-2.html" class="btn btn-secondary"  data-aos="zoom-out">Contact us</a>
            </div>
            <!-- /col-lg-->
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </section>
   <!-- /section ends -->
   <!-- section -->
   @include('partials._about')
   <!-- /section ends -->
   <!-- section --> 
   <section id="gallery-home" class="bg-primary container-fluid pl-0 pr-0">
      <div class="container text-light">
         <!-- section heading -->  
         <div class="section-heading text-center">
            <p class="subtitle">Image tour</p>
            <h2>Gallery</h2>
         </div>
         <!-- /section-heading -->
      </div>
      <!-- owl carousel gallery  -->
      <div class="owl-stage owl-carousel owl-theme top-centered-nav magnific-popup mt-5">
         <div class="col-md-12 gallery-img hover-opacity">
            <!-- image -->
            <a href="img/gallery/gallery1.jpg" title="your caption here">
            <img src="img/gallery/gallery1.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
         <div class="col-md-12 gallery-img hover-opacity">
            <a href="img/gallery/gallery2.jpg" title="your caption here">
            <img src="img/gallery/gallery2.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
         <div class="col-md-12 gallery-img hover-opacity">
            <a href="img/gallery/gallery3.jpg" title="your caption here">
            <img src="img/gallery/gallery3.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
         <div class="col-md-12 gallery-img hover-opacity">
            <a href="img/gallery/gallery4.jpg" title="your caption here">
            <img src="img/gallery/gallery4.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
         <div class="col-md-12 gallery-img hover-opacity">
            <a href="img/gallery/gallery5.jpg" title="your caption here">
            <img src="img/gallery/gallery5.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
         <div class="col-md-12 gallery-img hover-opacity">
            <a href="img/gallery/gallery6.jpg" title="your caption here">
            <img src="img/gallery/gallery6.jpg" class="img-fluid rounded" alt="">
            </a>
         </div>
         <!-- /col-md-12 -->
      </div>
      <!-- /owl-carousel -->	
   </section>
   <!-- /section ends -->
   <!-- Section  -->
   @include('partials._counter')
   <!-- /section ends-->
   <!-- section-->
   @include('partials._contact')
   <!-- /section -->
@endsection
