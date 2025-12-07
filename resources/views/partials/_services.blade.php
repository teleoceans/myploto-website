<section id="call-widget" class="container-fluid pt-0 pb-0">
    <div class="row p-0">
        @foreach($services as $key => $service)
            @if($key < 3)
                <div class="call-box col-lg-4 p-0" style="position: relative;">
                    @if($service->status == 'inactive')
                        <!-- Inactive Service (No Link) -->
                        <div style="position: relative; display: inline-block;">
                            <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                            <div style="
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(255, 0, 0, 0.6); /* Red background with transparency */
                                color: white;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                font-size: 1.5em;
                                font-weight: bold;
                                text-transform: uppercase;
                                z-index: 10;
                            ">
                                <span>Busy</span>
                                <span>Contact us on <a href="https://wa.me/+971566761778" style="color:white; text-decoration: underline;">Whatsapp</a></span>

                            </div>
                        </div>
                        <div class="call-title">
                            <!-- call-info -->
                            <div class="call-info text-center">
                                <p class="subtitle text-light">Book Now!</p>
                                <h3 class="text-light">{{ $service->name }}</h3>
                            </div>
                        </div>
                    @else
                        <!-- Active Service (With Link) -->
                        <a href="{{ route('pages.services', $service->id) }}">
                            <div style="position: relative; display: inline-block;">
                                <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                            </div>
                            <div class="call-title">
                                <!-- call-info -->
                                <div class="call-info text-center">
                                    <p class="subtitle text-light">Book Now!</p>
                                    <h3 class="text-light">{{ $service->name }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
            @else
                <div class="call-box col-lg-3 p-0" style="position: relative;">
                    @if($service->status == 'inactive')
                        <!-- Inactive Service (No Link) -->
                        <div style="position: relative; display: inline-block;">
                            <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                            <div style="
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(255, 0, 0, 0.6); /* Red background with transparency */
                                color: white;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                font-size: 1.5em;
                                font-weight: bold;
                                text-transform: uppercase;
                                z-index: 10;
                            ">
                                <span>Busy</span>
                              <span>Contact us on <a href="https://wa.me/+971566761778" style="color:white; text-decoration: underline;">Whatsapp</a></span>
                            </div>
                        </div>
                        <div class="call-title">
                            <!-- call-info -->
                            <div class="call-info text-center">
                                <p class="subtitle text-light">Book Now!</p>
                                <h3 class="text-light">{{ $service->name }}</h3>
                            </div>
                        </div>
                    @else
                        <!-- Active Service (With Link) -->
                        <a href="{{ route('pages.services', $service->id) }}">
                            <div style="position: relative; display: inline-block;">
                                <img src="services/{{ $service->web_image }}" alt="" class="center-block img-responsive">
                            </div>
                            <div class="call-title">
                                <!-- call-info -->
                                <div class="call-info text-center">
                                    <p class="subtitle text-light">Book Now!</p>
                                    <h3 class="text-light">{{ $service->name }}</h3>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    <!-- /row -->
</section>
