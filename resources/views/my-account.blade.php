@extends('layouts.web')
@section('title', 'My Account')

@section('content')

<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <!-- jumbo-heading -->
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>My Orders</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
            @if(count($books) === 0)
               <p>You don't have orders yet. Select your service and book <a href="{{ route('pages.home') }}">NOW!</a></p>
            @else
               <h4 class="mt-3">My Orders</h4>
               <hr>
               @foreach($books as $book)
                  @php
                     $service = \App\Models\Service::find($book->service_id);
                     $pet = \App\Models\Pet::find($book->pet_id);
                  @endphp
                  <div class="row">
                     <!-- event INFO -->	
                     <div class="col-lg-5">
                        <!-- image event -->	
                        <img class="img-fluid rounded" style="max-height: 320px" src="{{ url('/') }}/services/{{ $service->web_image }}" alt="">
                     </div>
                     <div class="col-lg-7">
                        <!-- list -->
                        <ul class="list-unstyled colored-icons font-weight-bold res-margin">
                           <li><span>Service: </span><br> <span class="badge badge-primary">{{ $service->name ?? " "  }}</span></li>
                           <li><span>Service Location: </span><br><span class="badge badge-primary"> {{ $book->pick_up_location  ?? " " }}</span></li>
                           <li><span>Pet: </span><br> <span class="badge badge-primary">{{ $pet->name ?? " " }}</span></li>
                           <li><span>Service Date: </span><br> <span class="badge badge-primary">{{ $book->from_time ?? " "  }}</span></li>
                           @if($book->trip_type)
                              <li><span>Trip Type: </span><br> <span class="badge badge-primary">{{ $book->trip_type }}</span></li>
                           @endif
                           @if($book->drop_off_location)
                              <li><span>Drop Off Location: </span><br> <span class="badge badge-primary">{{ $book->drop_off_location ?? " "  }}</span></li>
                           @endif
                           @if($book->training_type)
                              @php $training = \App\Models\Selection::find($book->training_type) @endphp
                              <li><span>Training Type:</span><br> <span class="badge badge-primary">{{ $training->name  ?? " " }}</span></li>
                           @endif
                           @if($book->pet_issue)
                              <li><span>Pet Issues: </span><br><span class="badge badge-primary">{{ $book->pet_issue ?? " "  }}</span></li>
                           @endif
                           @if($book->groom_type)
                              @php $g_t = \App\Models\Selection::find($book->training_type) @endphp
                              <li><span>Groom Type:</span><br> <span class="badge badge-primary">{{ $g_t->name  ?? " " }}</span></li>
                           @endif
                           @if($book->notes)
                              <li><span>Addional Notes: </span><br><span class="badge badge-primary">{{ $book->notes  ?? " " }}</span></li>
                           @endif
                        </ul>
                     
                     </div>
                     <!-- col-lg-7 -->	
                     <div class="col-lg-12"><br><hr><br></div>
                  </div>
               @endforeach
            @endif
         </div>
         <!-- /col-lg-6-->
         <div class="col-lg-6">
            @if(count($books) === 0)
               <p>You don't have saved pets!</a></p>
            @endif
            <h2>Add New Pet</h2>
            @include('partials._message')

            <form method="POST" action="{{ route('pages.add_pet') }}">
               @csrf
               <label>Pet Name: *</label>
               <input type="text" name="name" class="form-control" placeholder="e.g. Hunter" required>

               <label>Pet Type: *</label>
               <input type="text" name="type" class="form-control" placeholder="e.g. dog, cat" required>

               <label>Pet Breed: *</label>
               <input type="text" name="breed" class="form-control" placeholder="e.g. Huskey" required>

               <label>Pet Gender: *</label>
               <select name="gender" class="form-control" required>
                  <option>-SELECT PET GENDER-</option>
                  <option>Male</option>
                  <option>Female</option>
               </select>
               
                <label>Pet Size: *</label>
               <input type="text" name="size" class="form-control" placeholder="e.g. S, M, L" required>

               <label>Pet Age: *</label>
               <input type="text" name="age" class="form-control" placeholder="e.g. 1 month" required>

               <label>Pet Weight: * (KG)</label>
               <input type="text" name="weight" class="form-control" placeholder="2 KG" required>

               
               <label>Addional Notes:</label>
               <textarea name="notes" class="form-control" placeholder="e.g. Very sensitive"></textarea>

               <button class="btn btn-primary" type="submit">+ Add Pet</button>
            </form>
            <br><hr><br>
            <h4 class="mt-3">My Pets</h4>
            <hr>
            @foreach($pets as $pet)
               <h4>{{ $pet->name ?? " "  }} </h4>
               <b>Type: </b>{{ $pet->type  ?? " " }} <br>
               <b>Breed: </b>{{ $pet->breed  ?? " " }} <br>
               <b>Gender: </b>{{ $pet->gender ?? " "  }} <br>
               <b>Age: </b>{{ $pet->age ?? " "  }} <br>
               <b>Notes: </b><br>
               <p>{{ $pet->notes ?? " "  }}</p>
               <a href="{{ route('pages.remove_pet', $pet->id) }}" class="btn btn-danger" style="padding: 5px; font-size: 12px">Remove Pet</a>
               <br><hr><br>
            @endforeach
         </div>
      </div>
      <!-- /row -->
   </div>
   <!-- /container-->
  <!-- Section  -->
  @include('partials._counter')
   <!-- /section ends-->
@endsection