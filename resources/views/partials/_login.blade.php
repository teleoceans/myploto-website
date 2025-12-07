<section id="contact-home" class="container-fluid">
   <!-- section heading -->
   <div class="section-heading text-center">
      <p class="subtitle">Welcome Back</p>
      <h2>Login</h2>
      <p>
         Doesn't have an account?
         <br>
         <a href="{{ route('register') }}">Register now!</a>
      </p>

   </div>
   <!-- /section-heading -->
   <div class="container" style="margin-top: -60px">
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
                     <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                                <br>
                              <label>Email</label>
                              <input type="email" name="email" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-12">
                              <label>Password<span class="required">*</span></label>
                              <input type="password" name="password" class="form-control input-field" required>
                           </div>
                        </div>
                        <!-- button -->
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-quaternary btn-block mt-3">Login</button>
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