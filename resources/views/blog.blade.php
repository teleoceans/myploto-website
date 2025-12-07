@extends('layouts.web')
@section('title', 'Blog Posts')

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
               <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
         @foreach($posts as $key=>$post)
            <div class="col-lg-4 res-margin">
               <!-- blog-box -->
               <div class="blog-box">
                  <!-- image -->
                  <div style="height: 240px" class="text-center">
                     <a href="{{ route('pages.blog.show', $post->id) }}">
                        <div class="image"><img src="{{ url('/') }}/public/blog/{{ $post->image }}" style="height: 240px" alt=""></div>
                     </a>
                  </div>
                  <!-- blog-box-caption -->
                  <div class="blog-box-caption">
                     <!-- date -->
                     <div class="date"><span class="day">{{ $post->created_at->format('m') }}</span>
                     <span class="month">{{ $post->created_at->format('M') }}</span></div>
                     <a href="{{ route('pages.blog.show', $post->id) }}">
                        <h4 style="height: 50px">{{ $post->title }}</h4>
                     </a>
                     <!-- /link -->
                     <p style="height: 55px; overflow-y: hidden">
                        {!! strip_tags($post->body) !!}
                     </p>
                  </div>
                  <!-- blog-box-footer -->
                  <div class="blog-box-footer"> 
                     <div class="text-center col-md-12">
                        <a href="{{ route('pages.blog.show', $post->id) }}" class="btn btn-primary ">Read more</a>
                     </div>
                  </div>
                  <!-- /blog-box-footer -->
               </div>
               <!-- /blog-box -->
            </div>
            @if($key+1 % 3 == 0)
            <div class="col-lg-12"><hr></div>
            @endif
         @endforeach
      </div>

      <div class="row">
         <div class="col-md-12 mt-5">
            <!-- pagination -->
            {{ $posts->links() }}
            <!-- /nav -->
         </div>
      </div>
   </div>
</div>
<!-- /container-->
<!-- Section  -->
@include('partials._counter')
<!-- /section ends-->
@endsection