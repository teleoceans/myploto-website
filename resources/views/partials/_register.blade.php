<section id="contact-home" class="container-fluid">
   <!-- section heading -->
   <div class="section-heading text-center">
      <p class="subtitle">Join Us</p>
      <h2>Register</h2>
   </div>
   <!-- /section-heading -->
   <div class="container">
      <div class="row">
         <!-- image -->
         <img src="{{ url('/') }}/img/contactbg1.png" class="img-fluid contact-home-img hidden-medium-small" alt="">
         <!-- contact box -->
         <div class="col-lg-6 offset-lg-3 h-100">
            @include('partials._message')
            <div class="contact-form3 bg-secondary" data-aos="flip-right">
               <!-- Form Starts -->
               <div id="contact_form">
                  <div class="form-group">
                     <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                                <br>
                              <label>Name<span class="required">*</span></label>
                              <input type="text" name="name" class="form-control input-field" required="">
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                           </div>
                           <div class="col-md-12">
                              <label>Email<span class="required">*</span></label>
                              <input type="email" name="email" class="form-control input-field" required="">
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                           </div>
                           <div class="col-md-12">
                              <label>Password<span class="required">*</span></label>
                              <input type="password" name="password" class="form-control input-field" required>
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                           </div>
                           
                           <div class="col-md-12">
                              <label>Phone Number<span class="required">*</span></label>
                              <input type="text" name="phone_number" class="form-control input-field" required>
                           </div>

                           <div class="col-md-12">
                              <label>City<span class="required">*</span></label>
                              <input type="text" name="city" class="form-control input-field" required>
                           </div>
                           
                           <div class="col-md-12">
                              <label>Address<span class="required">*</span></label>
                              <input type="text" name="address" class="form-control input-field" required>
                           </div>
                        </div>
                        <!-- button -->
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-quaternary btn-block mt-3">Sign Up</button>
                     </form>
                  </div>
                  <!-- /form-group-->
                  <!-- Contact results -->
                  <div id="contact_results"></div>
               </div>
               <!-- /contact-form-->
            </div>
            
            <img src="{{ url('/') }}/img/introimg1.jpg" style="max-width: 80%">
         </div>
      </div>
      <!-- /row-->
   </div>
   <!-- /container-->
</section>


@section('scripts')

@endsection