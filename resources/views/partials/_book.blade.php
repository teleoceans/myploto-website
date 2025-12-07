@section('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
@endsection


<div class="container">
    <div class="row">
        <div class="col-lg-6 contact-form3 bg-light h-100">
            <div class="contact-image bg-light">
                <!-- envelope icon-->
                <i class="fas fa-book bg-light"></i>
            </div>
            <h5 class="text-center mt-3" id="title">{{ Auth::user()->name }}, create your order</h5>

           <p>   {{ $single->description }} </p>
         
            <!-- Form Starts -->
            <div id="contact_form">
                <div class="form-group">
                <form action="{{ route('pages.services_book') }}" method="post">
                @csrf

                    <div class="row">
              
                         @if($single->id != 4 && $single->id != 3 && $single->id != 6   && $single->id != 7 && $single->id != 1 && $single->id != 2 && $single->id != 5)

                        <div class="col-md-6">
                            <label>Service Location<span class="required">*</span></label>
                            @if($single->id == 5)
                            <input type="text" value="Facility"
                                 name="service_location" class="form-control" required="">
                            @else
                            <input type="text" value="{{ Auth::user()->address }} - {{ Auth::user()->city }}"
                                 name="service_location" class="form-control" required="">
                            @endif
                            
                        </div>
                    
                         @endif

                        <div class="col-md-{{$single->id == 4 || $single->id == 3 || $single->id == 6 ? 12 : 6}}">
                          <label>Service<span class="required">*</span></label>
                             <select name="service_id" class="form-control input-field service" id="service" required>
                                <option value="">-SELECT YOUR SERVICE-</option>
                                     @foreach($services as $service)
                                      @if($service->status == 'active')
                                      <option value="{{ $service->id }}"
                                         @if($single->id == $service->id) selected @endif
                                       data-price="{{ $service->price }}" data-id="{{ $service->id }}">{{ $service->name }}</option>
                                       @endif
                                    @endforeach
                                 </select>
                              </div>

                        
                        
                        
                        
                          @if($single->id == 4 || $single->id == 3 || $single->id == 6)

                             <div class="col-md-6">
                                 <label>Contact us</label>
                           <a href="https://api.whatsapp.com/send?phone=+971566761778&text={{"I want to book $single->name"}}"  class="btn btn-success btn-block mt-3"> WhatsApp <i class="fab fa-whatsapp"></i></a>
                        </div>
                        @endif
                        
                        
                        
                        
                          @if($single->id != 4 && $single->id != 3 && $single->id != 6)

                        <div class="col-md-6">
                            <label>Select Your Pet<span class="required">*</span> 
                            <a href="{{ route('pages.my-account') }}"> (Add Pet)</a></label>
                            <select name="pet_id[]" class="input-field multi-select" id="selectt" multiple required>
                                @foreach($pets as $pet)
                                <option data-pet-type="{{   Str::ucfirst($pet->type) }}" data-pet-size="{{Str::ucfirst($pet->size)}}" value="{{ $pet->id }}">{{ $pet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                         @if($single->id != 4 && $single->id != 3 && $single->id != 6 && $single->id != 1 && $single->id != 5)

                        <div class="col-md-6">
                            <label>Service Date<span class="required">*</span></label>
                            	<input type="text" name="from_date" id="from_date"  class="form-control date" placeholder="Pick the multiple dates">
                        </div>
                        
                        @endif



                        @if($single->id == 5 || $single->id == 1)

                        <div class="col-md-6">
                            <label>Service Date<span class="required">*</span></label>
                            	<input type="date" name="from_date" class="form-control" id="dateInput">

                        </div>
                        
                        @endif


                        <!-- ------------------------------- -->
                        <!-- ------------------------------- -->
                        <!-- ------------------------------- -->
                        <!-- ------------------------------- -->
                        <!-- ------------------------------- -->
                        
                        



                        @if($single->id == 7)
                        <div class="col-md-12">
                            <label>Select Your Package<span class="required">*</span> 
                            <select name="packege" class="input-field" id="packageSelecttt" required>
                        <option data-price="0" value="0">Select Pet Please</option>
                            </select>
                        </div>
                            @endif
                            
                            
                                @if($single->id == 5)
                        <div class="col-md-6">
                            <label>Training Type<span class="required">*</span></label>
                            <select name="training_type[]" class="input-field multi-select" id="service" multiple required>
                                @foreach($trainings as $t)
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                            
                        @if($single->id == 5)
                        <div class="col-md-12">
                            <label>Select Your Location<span class="required">*</span> 
                            <select name="package" class="input-field multi-select" id="packageSelectttt" required>
                             
                                <option data-price="50" value="facility">At our facility (50 AED)</option>
                      <option data-price="450" value="Abu Dhabi">Abu Dhabi (450 AED)</option>
                         <option data-price="350" value="Dubai">Dubai (350 AED)</option>
                        <option data-price="400" value="Sharjah">Sharjah (400 AED)</option>


                            </select>
                        </div>

                            @endif
                            
                            
                            
                            
                
                            
                            
                         @if( $single->id == 1)
                        <div class="col-md-6">
                            <label>From Time<span class="required">*</span></label>
                            <input type="text" name="from_time" class="form-control timepicker" autocomplete="off" required="">
                        </div>
                        @endif
                        
                        <!--@if( $single->id == 2)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>To Date<span class="required">*</span></label>-->
                        <!--    <input type="text" name="to_date" class="form-control datepicker" required="">-->
                        <!--</div>-->
                        <!--@endif-->

                    
                    
                              @if($single->id == 2)
                  <div class="col-md-12">
    <label>Select Your Package<span class="required">*</span> 
        <select name="package" id="packageSelectt" required>
            <option data-price="10" value="per_hour">Per hour (10 AED)</option>
            <option data-price="60" value="full_day">Full Day (60 AED)</option>
            <option data-price="540" value="10_day">10 days (540 AED)</option>
            <option data-price="1080" value="20_day">20 days (1080 AED)</option>
            <option data-price="1620" value="30_day">30 days (1620 AED)</option>
            <option data-price="1560" value="unlimited_monthly">Unlimited Monthly (1560 AED)</option>
        </select>
    </label>
</div>

                            @endif

                        
                        <!--@if($single->id == 7 )-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>To Time<span class="required">*</span></label>-->
                        <!--    <input type="text" name="to_time" class="form-control timepicker" autocomplete="off" required="">-->
                        <!--</div>-->
                        <!--@endif-->

                        <!--@if($single->id == 4)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Waiting Time (In Minutes)<span class="required">*</span></label>-->
                        <!--    <input type="text" name="waiting_time" class="form-control" placeholder="e.g. 80 minutes" required="">-->
                        <!--</div>-->
                        <!--@endif-->

                        <!--@if($single->id == 4)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Trip Type<span class="required">*</span></label>-->
                        <!--    <select name="trip_type" class="form-control input-field" required>-->
                        <!--        <option value="">-SELECT Trip Type-</option>-->
                        <!--        <option value="one_way">One way trip</option>-->
                        <!--        <option value="two_way">Two way trip</option>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <!--@endif-->

                        <!--@if($single->id == 4)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Pickup Location<span class="required">*</span></label>-->
                        <!--    <input type="text" name="pick_up_location" class="form-control input-field" required="">-->
                        <!--</div>-->
                        <!--@endif-->

                        <!--@if($single->id == 4)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Dropoff Location<span class="required">*</span></label>-->
                        <!--    <input type="text" name="drop_off_location" class="form-control input-field" required="">-->
                        <!--</div>-->
                        <!--@endif-->

                    

                        <!--@if($single->id == 5)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Pet Issues</label>-->
                        <!--    <input type="text" name="pet_issue" class="form-control input-field">-->
                        <!--</div>-->
                        <!--@endif-->

                        @if($single->id == 1)
                        <div class="col-md-6">
                            <label>Grooming Type<span class="required">*</span></label>
                            <select name="grooming_addional" id="packageSelectGrooming" required>
                                <option value="">-SELECT Grooming TYPE-</option>
                                <option data-price="114" value="Full Grooming">Full Grooming (114 AED)</option>
                                <option data-price="78" value="Basic Grooming">Basic Grooming (78 AED)</option>
                            </select>
                        </div>
                        @endif

                        <!--@if($single->id == 1)-->
                        <!--<div class="col-md-6">-->
                        <!--    <label>Groom Addional<span class="required">*</span></label>-->
                        <!--    <select name="grooming_type" class="form-control input-field" id="service" required>-->
                        <!--        <option value="">-SELECT Grooming ADDITIONAL-</option>-->
                        <!--        @foreach($groomings as $g)-->
                        <!--        <option value="{{ $g->id }}">{{ $g->name }}</option>-->
                        <!--        @endforeach-->
                        <!--    </select>-->
                        <!--</div>-->
                        <!--@endif-->

                                                 @if($single->id != 4 && $single->id != 3 && $single->id != 6)


                        <div class="col-md-12">
                            <label>Booking Notes</label>
                            <textarea name="notes" class="form-control input-field"></textarea>
                        </div>
                        @endif
                    </div>
                    <!-- button -->
                    <br>
                    
                          @if($single->id == 5)
            <p>
               
                
                You can book your 
assessment session from 
Sunday to Friday from 10 
am to 
4pm. For an 
evaluation session in your 
home, call us: +971566761778
            </p>
            @endif
                    
                  
                
                    @if($single->id != 4 && $single->id != 3 && $single->id != 6)
                <h4>Total After 5% tax: <span id="total">0</span> AED</h4>
            <input type="hidden" value="{{$single->price}}" name="price" id="hiddenPrice">

                    @endif
                                 @if($single->id != 4 && $single->id != 3 && $single->id != 6)

                    <img src="{{ url('/') }}/img/cc.png">
                        @endif
                    @include('partials._message')
                                             @if($single->id != 4 && $single->id != 3 && $single->id != 6)

                    <button type="submit" id="submit_order" value="Submit" 
                    class="btn btn-primary btn-block mt-3">Checkout</button>
                    @endif
                </div>
                </form>

                <!-- /form-group-->
                <!-- Contact results -->
                <div id="contact_results"></div>
            </div>
            <!-- /contact-form-->
        </div>

        <div class="col-lg-6">
            <img style="margin-top: 60px" src="{{ url('/') }}/img/box1.jpg" alt="" class="img-rotate-outline img-right-absolute img-fluid">
        </div>
       
    </div>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>

<script>
    $('.multi-select').multipleSelect();

    $('.service').change(function() {
        let service_id = $(this).find(':selected').data('id');
        let url = "{{ route('pages.services', '') }}";
        window.location.href = url+"/"+service_id;
    });
    $(document).ready(function() {
        $('.timepicker').timepicker({ 'timeFormat': 'HH:mm' });
    });
</script>



// <script>
//     $(document).ready(function() {
//         $('#packageSelectt').change(function() {
//             var selectedOption = $('#packageSelectt option:selected');
//             var price = parseFloat(selectedOption.data('price'));
//             $('#total').text(price);
//         });
//     });
// </script>


     @if( $single->id == 2)
     
     
     <script>
    $(document).ready(function () {
        $('#selectt').change(function () {
            console.log("Pet dropdown changed");

            // Get an array of selected pet types
            var selectedPetTypes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-type');
            }).get();
              var selectedPetSizes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-size');
            }).get();
            var selectedPets = $('#selectt').find('option:selected');

            console.log("Selected Pet Types:", selectedPetTypes);

            var packageDropdown = $('#packageSelectt').empty();
            console.log("Package dropdown cleared");

            // Clear existing options
            packageDropdown.html('<option selected data-price="0">...</option>');

            // Check if both "Dog" and "Cat" are selected
            var hasDog = selectedPetTypes.includes('Dog');
            var hasDogS = selectedPetSizes.includes('S');
            var hasDogL = selectedPetSizes.includes('L');
            var hasDogM = selectedPetSizes.includes('M');
            var hasCat = selectedPetTypes.includes('Cat');
            var has_cat = selectedPetTypes.includes('cat');
            var dogCount = selectedPets.filter('[data-pet-type="Dog"]').length;
            var catCount = selectedPets.filter('[data-pet-type="Cat"]').length;
                        var cat_Count = selectedPets.filter('[data-pet-type="cat"]').length;

            if ((hasCat || has_cat) && hasDog) {
                console.log("Adding options for Dog");
            
                // Add options for Dog
                var optionsHtml = `
                    <option data-price="10" value="per_hour">Per hour (10 AED)</option>
                    <option data-price="${72 * dogCount + 60 * (catCount || cat_Count)}" value="full_day">Full Day (${60 * (catCount || cat_Count)} AED for Cat) (${72 * dogCount} AED for Dog)</option>
                    <option data-price="${450 * dogCount + 300 * (catCount || cat_Count)}" value="10_day">10 days (${300 * (catCount || cat_Count)} AED for Cat) (${450 * dogCount} AED for Dog)</option>
                    <option data-price="${900 * dogCount + 600 * (catCount || cat_Count)}" value="20_day">20 Days (${600 * (catCount || cat_Count)} AED for Cat) (${900 * dogCount} AED for Dog)</option>
                    <option data-price="${1350 * dogCount + 900 * (catCount || cat_Count)}" value="30_day">30 Days (${900 * (catCount || cat_Count)} AED for Cat) (${1350 * dogCount} AED for Dog)</option>
                    <option data-price="${1350 * dogCount + 900 * (catCount || cat_Count)}" value="unlimited_monthly">Unlimited Monthly (${900 * (catCount || cat_Count)} AED for Cat) (${1350 * dogCount} AED for Dog)</option>
               
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasCat || has_cat) {
                console.log("Adding options for Cat");
                // Add options for Cat
                var optionsHtml = `
             <option data-price="10" value="per_hour">Per hour (10 AED)</option>
            <option data-price="60" value="full_day">Full Day (60 AED)</option>
            <option data-price="300" value="10_day">10 days (300 AED)</option>
            <option data-price="600" value="20_day">20 days (600 AED)</option>
            <option data-price="900" value="30_day">30 days (900 AED)</option>
            <option data-price="900" value="unlimited_monthly">Unlimited Monthly (900 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasDog && hasDogS) {
                console.log("Both Cat and Dog are selecteddddd");
                // Add options for both Cat and Dog
                var optionsHtml = `
            <option data-price="10" value="per_hour">Per hour (10 AED)</option>
            <option data-price="72" value="full_day">Full Day (72 AED)</option>
            <option data-price="450" value="10_day">10 days (450 AED)</option>
            <option data-price="900" value="20_day">20 days (900 AED)</option>
            <option data-price="1350" value="30_day">30 days (1350 AED)</option>
            <option data-price="1350" value="unlimited_monthly">Unlimited Monthly (1350 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasDog && hasDogM) {
                console.log("Both Cat and Dog are selecteddddd");
                // Add options for both Cat and Dog
                var optionsHtml = `
            <option data-price="10" value="per_hour">Per hour (10 AED)</option>
            <option data-price="80" value="full_day">Full Day (80 AED)</option>
            <option data-price="500" value="10_day">10 days (500 AED)</option>
            <option data-price="1000" value="20_day">20 days (1000 AED)</option>
            <option data-price="1500" value="30_day">30 days (1500 AED)</option>
            <option data-price="1500" value="unlimited_monthly">Unlimited Monthly (1500 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            }else if (hasDog && hasDogL) {
                console.log("Both Cat and Dog are selecteddddd");
                // Add options for both Cat and Dog
                var optionsHtml = `
            <option data-price="10" value="per_hour">Per hour (10 AED)</option>
            <option data-price="80" value="full_day">Full Day (88 AED)</option>
            <option data-price="550" value="10_day">10 days (550 AED)</option>
            <option data-price="1100" value="20_day">20 days (1100 AED)</option>
            <option data-price="1650" value="30_day">30 days (1650 AED)</option>
            <option data-price="1650" value="unlimited_monthly">Unlimited Monthly (1650 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            }  else {
                console.log("No specific conditions met");
                // Add options for other cases or leave it empty
                var optionsHtml = `
                    <option data-price="0" value="per_day">Select Pets Please For Packages</option>
                `;
                packageDropdown.append(optionsHtml);
            }
            // Add conditions for other pet types if needed
        });
    });
</script>



     
     
     
     
     
<script>
    $(document).ready(function () {
        function calculateTotal() {
         var selectedOptions = $('#selectt').find('option:selected');
         var selectedPetCount = selectedOptions.length;
         var selectedDates = $(".date").val().split(",");
         var selectedCount = selectedDates.length;
         var pricePerPet = parseFloat($('#total').data('price'));

             if (isNaN(pricePerPet)) {
                total = 60;
            }

            if (pricePerPet == 132 || pricePerPet == 60 || pricePerPet == 72 || pricePerPet == 80) {
                var total = ((((pricePerPet * selectedCount) * selectedPetCount )* 5) / 100 + (pricePerPet * selectedCount) * selectedPetCount );
            } else {
                var total = (((pricePerPet  * selectedPetCount) * 5) / 100 + (pricePerPet  * selectedPetCount));
            }
          if (isNaN(total)) {
                total = 0;
            }
            $('#total').text(total);
            $('#hiddenPrice').val(total);
        }

       $('#selectt, #from_date').change(function () {
            calculateTotal();
        });

        $('#packageSelectt').change(function () {
            var selectedOption = $(this).find('option:selected');
            var price = parseFloat(selectedOption.data('price'));
          
            $('#total').data('price', price);
            calculateTotal(); // Trigger total calculation
        });

        // Initialize the total based on the default selected package
        $('#packageSelectt').trigger('change');
    });
</script>
@endif



@if($single->id == 7)

<script>
    $(document).ready(function () {
        $('#selectt').change(function () {
            console.log("Pet dropdown changed");

            // Get an array of selected pet types
            var selectedPetTypes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-type');
            }).get();
            var selectedPets = $('#selectt').find('option:selected');

            console.log("Selected Pet Types:", selectedPetTypes);

            var packageDropdown = $('#packageSelecttt').empty();
            console.log("Package dropdown cleared");

            // Clear existing options
            packageDropdown.html('<option selected data-price="0">...</option>');

            // Check if both "Dog" and "Cat" are selected
            var hasDog = selectedPetTypes.includes('Dog');
            var hasCat = selectedPetTypes.includes('Cat');
            var dogCount = selectedPets.filter('[data-pet-type="Dog"]').length;
            var catCount = selectedPets.filter('[data-pet-type="Cat"]').length;
         
            if (hasCat && hasDog) {
                console.log("Adding options for Dog");
            
                // Add options for Dog
                var optionsHtml = `
                     <option data-price="${110 * dogCount + 70 * catCount }" value="per_day">Per Day (${70 * catCount} AED for Cat) (${110 * dogCount} AED for Dog)</option>
                    <option data-price="1620" value="10_day">10 days (630 AED for Cat) (990 AED for Dog)</option>
                    <option data-price="3130" value="20_day">20 days (1260 AED for Cat) (1870 AED for Dog)</option>
                    <option data-price="4530" value="30_day">30 days (1890 AED for Cat) (2640 AED for Dog)</option>
                    <option data-price="4295" value="unlimited_monthly">Unlimited Monthly (1820 AED for Cat) (2475 AED for Dog)</option>
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasCat) {
                console.log("Adding options for Cat");
                // Add options for Cat
                var optionsHtml = `
                    <option data-price="70" value="per_day">Per Day (70 AED)</option>
                    <option data-price="630" value="10_day">10 days (630 AED)</option>
                    <option data-price="1260" value="20_day">20 days (1260 AED)</option>
                    <option data-price="1890" value="30_day">30 days (1890 AED)</option>
                    <option data-price="1820" value="unlimited_monthly">Unlimited Monthly (1820 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasDog) {
                console.log("Both Cat and Dog are selected");
                // Add options for both Cat and Dog
                var optionsHtml = `
             
                    
                    
                      <option data-price="110" value="per_day">Per Day (110 AED)</option>
                    <option data-price="990" value="10_day">10 days (990 AED)</option>
                    <option data-price="1870" value="20_day">20 days (1870 AED)</option>
                    <option data-price="2640" value="30_day">30 days (2640 AED)</option>
                    <option data-price="2475" value="unlimited_monthly">Unlimited Monthly (2475 AED)</option>
                `;
                packageDropdown.append(optionsHtml);
            } else {
                console.log("No specific conditions met");
                // Add options for other cases or leave it empty
                var optionsHtml = `
                    <option data-price="0" value="per_day">Select Pets Please For Packages</option>
                `;
                packageDropdown.append(optionsHtml);
            }
            // Add conditions for other pet types if needed
        });
    });
</script>







<script>
    $(document).ready(function () {
        function calculateTotal() {
    var selectedOptions = $('#selectt').find('option:selected');
    var selectedPetCount = selectedOptions.length;
            var selectedDates = $(".date").val().split(",");
            var selectedCount = selectedDates.length;
            
              var selectedPetTypes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-type');
            }).get();
            
           var selectedPets = $('#selectt').find('option:selected');
           var hasDog = selectedPetTypes.includes('Dog');
           var hasCat = selectedPetTypes.includes('Cat');
            console.log("Selected Pet Types:", selectedPetTypes);
            
            var pricePerPet = parseFloat($('#total').data('price'));
           
             if (isNaN(pricePerPet)) {
                total = 110;
            }

            if (pricePerPet == 110) {
                  var total = ((((pricePerPet * selectedCount) * selectedPetCount )* 5) / 100 + (pricePerPet * selectedCount) * selectedPetCount );
            } else {
                if(hasDog && hasCat){
                   var total = (((pricePerPet * selectedCount)  * 5) / 100 + (pricePerPet * selectedCount));
                }else{
                
                   
                  var total = (((pricePerPet  * selectedCount) * 5) / 100 + (pricePerPet  * selectedCount));
                }
            }
          if (isNaN(total)) {
                total = 0;
            }
            $('#total').text(total);
            $('#hiddenPrice').val(total);
        }

       $('#selectt, #from_date').change(function () {
            calculateTotal();
        });

        $('#packageSelecttt').change(function () {
            var selectedOption = $(this).find('option:selected');
            var price = parseFloat(selectedOption.data('price'));
          
            $('#total').data('price', price);
            calculateTotal(); // Trigger total calculation
        });

        // Initialize the total based on the default selected package
        $('#packageSelectt').trigger('change');
    });
</script>
@endif


<!--     @if( $single->id == 7)-->
<!--     <script>-->
<!--    $(document).ready(function() {-->
<!--        $('#selectt').change(function() {-->
<!--            var selectedOptions = $(this).find('option:selected');-->
<!--               var selectedDates = $(".date").val().split(",");-->
<!--                var selectedCount = selectedDates.length;-->
<!--            var pricePerPet = parseFloat($('#total').data('price'));-->
<!--      if(pricePerPet == 70){-->
<!--           var total = ((pricePerPet * 5) / 100 + pricePerPet ) * selectedCount ;-->

<!--      }else{-->
<!--           var total = ((pricePerPet * 5) / 100 + pricePerPet ) ;-->

<!--      }-->
<!--            $('#total').text(total);-->
<!--              $('#hiddenPrice').val(total); -->
<!--        });-->

<!--        $('#packageSelecttt').change(function() {-->
<!--            var selectedOption = $(this).find('option:selected');-->
<!--              var selectedDates = $(".date").val().split(",");-->
<!--                var selectedCount = selectedDates.length;-->
                
<!--            var price = parseFloat(selectedOption.data('price'));-->
<!--            $('#total').data('price', price);-->
            $('#selectt').trigger('change'); // Trigger multi-select change event
<!--        });-->

        // Initialize the total based on the default selected package
<!--        $('#packageSelectt').trigger('change');-->
<!--    });-->
<!--</script>-->
<!--@endif-->






     @if( $single->id == 1)
     
     
         <script>
    $(document).ready(function () {
        $('#selectt').change(function () {
            console.log("Pet dropdown changed");

            // Get an array of selected pet types
            var selectedPetTypes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-type');
            }).get();
              var selectedPetSizes = $('#selectt').find('option:selected').map(function () {
                return $(this).attr('data-pet-size');
            }).get();
            var selectedPets = $('#selectt').find('option:selected');

            console.log("Selected Pet Types:", selectedPetTypes);

            var packageDropdown = $('#packageSelectGrooming').empty();
            console.log("Package dropdown cleared");

            // Clear existing options
            packageDropdown.html('<option selected data-price="0">...</option>');

            // Check if both "Dog" and "Cat" are selected
            var hasDog = selectedPetTypes.includes('Dog');
            var hasDogS = selectedPetSizes.includes('S');
            var hasDogL = selectedPetSizes.includes('L');
            var hasDogM = selectedPetSizes.includes('M');
            var hasCat = selectedPetTypes.includes('Cat');
            var has_cat = selectedPetTypes.includes('cat');
            var dogCount = selectedPets.filter('[data-pet-type="Dog"]').length;
            var catCount = selectedPets.filter('[data-pet-type="Cat"]').length;
            
            var LargeCount = selectedPets.filter('[data-pet-size="L"]').length;
            var MediumCount = selectedPets.filter('[data-pet-size="M"]').length;
            var SmallCount = selectedPets.filter('[data-pet-size="S"]').length;

                        var cat_Count = selectedPets.filter('[data-pet-type="cat"]').length;

            if (hasDogL && (hasDogS || hasDogM)) {
                console.log("Adding options for Dog");
            
              
                var optionsHtml = `
                 <option data-price="${114 * LargeCount + 84 * (SmallCount + MediumCount) }" value="per_day">Full Grooming  (${114 * LargeCount} AED for Large) (${84 * (SmallCount + MediumCount)} AED for Small Or Medium)</option>
                <option data-price="${78 * LargeCount + 66 * (SmallCount + MediumCount) }" value="per_day">Full Grooming  (${78 * LargeCount} AED for Large) (${66 * (SmallCount + MediumCount)} AED for Small Or Medium)</option>
                
                
           
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasDogL) {
                console.log("Adding options for Cat");
                // Add options for Cat
                var optionsHtml = `
           <option data-price="114" value="Full Grooming">Full Grooming (114 AED)</option>
               <option data-price="78" value="Basic Grooming">Basic Grooming (78 AED)</option>      
                `;
                packageDropdown.append(optionsHtml);
            } else if (hasDogS || hasDogM) {
                console.log("Large And Medium or small");
                // Add options for Cat
                var optionsHtml = `
                
                    <option data-price="84" value="Full Grooming">Full Grooming (84 AED)</option>
               <option data-price="66" value="Basic Grooming">Basic Grooming (66 AED)</option>  
                `;
                packageDropdown.append(optionsHtml);
            }   else {

                // Add options for other cases or leave it empty
                var optionsHtml = `
                    <option data-price="0" value="per_day">Select Pets Please For Packages</option>
                `;
                packageDropdown.append(optionsHtml);
            }
            // Add conditions for other pet types if needed
        });
    });
</script>
     
     
<script>
    $(document).ready(function() {
        function calculateTotal() {
            var selectedOptions = $('#selectt').find('option:selected');
            var pricePerPet = parseFloat($('#total').data('price'));
            var selectedCount = selectedOptions.length;
            var total = ((pricePerPet * selectedCount) * 5) / 100 + (pricePerPet * selectedCount);
            $('#total').text(total);
            $('#hiddenPrice').val(total);
        }

        $('#selectt').change(function() {
            calculateTotal();
        });

        $('.grooming-type').change(function() {
            var selectedOption = $(this).find('option:selected');
            var price = parseFloat(selectedOption.data('price'));
            $('#total').data('price', price);
            $('#selectt').trigger('change'); // Trigger multi-select change event
        });

        // Initialize the total based on the default selected package
        $('#packageSelectGrooming').change(function() {
            var selectedOption = $(this).find('option:selected');
            var price = parseFloat(selectedOption.data('price'));
            $('#total').data('price', price);
            calculateTotal();
        });

        // Initialize the total based on the default selected package
        $('#packageSelectGrooming').trigger('change');
    });
</script>
@endif


     @if( $single->id == 5)
     <script>
    $(document).ready(function() {
        $('#selectt').change(function() {
            var selectedOptions = $(this).find('option:selected');
            var pricePerPet = parseFloat($('#total').data('price'));
            var selectedCount = selectedOptions.length;
            var total = ((pricePerPet * selectedCount) * 5) / 100 + (pricePerPet * selectedCount) ;
            $('#total').text(total);
              $('#hiddenPrice').val(total); 
        });

        $('#packageSelectttt').change(function() {
            var selectedOption = $(this).find('option:selected');
            var price = parseFloat(selectedOption.data('price'));
            $('#total').data('price', price);
            $('#selectt').trigger('change'); // Trigger multi-select change event
        });

        // Initialize the total based on the default selected package
        $('#packageSelectttt').trigger('change');
    });
</script>
@endif


<script>
    $('.date').datepicker({
  multidate: true,
	format: 'dd-mm-yyyy'
});

</script>
@endsection