@extends('layouts.web')
@section('title', $post->title)

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Articles</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('pages.blog') }}">blog</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
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
      <div class="row">
      <div class="col-lg-12 blog-card page-with-sidebar">
            <h2 class="mb-2">{{ $post->title }}</h2>
            <!-- Post info-->
            <div class="post-info text-muted">
               {{ $post->created_at->diffForHumans() }}
            </div>
            <hr>
            <!-- Preview Image -->
            <img src="{{ url('/') }}/public/blog/{{ $post->image }}" class="img-fluid" alt="">
            <hr>
            <!-- Post Content -->
            
            <p>
               {!! $post->body !!}
            </p>
            <br><br>
         </div>
      </div>
   </div>
</div>
<!-- /container-->
<!-- Section  -->
@include('partials._counter')
<!-- /section ends-->
@endsection