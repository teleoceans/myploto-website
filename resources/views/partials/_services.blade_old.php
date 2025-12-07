<section id="call-widget" class="container-fluid pt-0 pb-0">
      <div class="row p-0">
         <!-- call 1 -->
        @foreach($services as $key => $service)
         @if($key < 3) 
            <div class="call-box col-lg-4 p-0">
               <a href="{{ route('pages.services', $service->id) }}">
                  <!-- image -->
                  <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                  <div class="call-title">
                     <!-- call-info -->
                     <div class="call-info text-center">
                        <p class="subtitle text-light">Book Now!</p>
                        <h3 class="text-light">{{ $service->name }}</h3>
                     </div>
                  </div>
               </a>
            </div>
         @endif
         @if($key > 2) 
            <div class="call-box col-lg-3 p-0">
               <a href="{{ route('pages.services', $service->id) }}">
                  <!-- image -->
                  <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                  <div class="call-title">
                     <!-- call-info -->
                     <div class="call-info text-center">
                        <p class="subtitle text-light">Book Now!</p>
                        <h3 class="text-light">{{ $service->name }}</h3>
                     </div>
                  </div>
               </a>
            </div>
         @endif
        @endforeach
      </div>
      <!-- /row -->
   </section>