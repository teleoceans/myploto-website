<section id="contact-home" class="container-fluid">
   <!-- section heading -->
   <div class="section-heading text-center">
      <p class="subtitle">Get in touch</p>
      <h2>Contact us</h2>
   </div>
   <!-- /section-heading -->
   <div class="container">
      <div class="row">
         <!-- image -->
         <img src="img/contactbg1.png" class="img-fluid contact-home-img hidden-medium-small" alt="">
         <!-- contact box -->
         <div class="col-lg-5 offset-lg-2 h-100">
            <div class="contact-form3 bg-secondary" data-aos="flip-right">
               <div class="contact-image bg-secondary">
                  <!-- envelope icon-->
                  <i class="fas fa-envelope bg-secondary"></i>
               </div>
               <h4 class="text-center mt-3 text-light">Send us a message</h4>
               <!-- Form Starts -->
               <div id="contact_form">
                  <div class="form-group">
                     <form method="post" action="{{ route('pages.contact_send') }}">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <label>Name<span class="required">*</span></label>
                              <input type="text" name="name" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-12">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-12">
                              <label>Phone Number<span class="required">*</span></label>
                              <input type="text" name="phone_number" class="form-control input-field" required>
                           </div>
                           <div class="col-md-12">
                              <label>Message<span class="required">*</span></label>
                              <textarea name="message" id="message" class="textarea-field form-control" rows="3" required=""></textarea>
                           </div>
                        </div>
                        <!-- button -->
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-quaternary btn-block mt-3">Send message</button>
                     </form>
                  </div>
                  <!-- /form-group-->
                  <!-- Contact results -->
                  <div id="contact_results"></div>
               </div>
               <!-- /contact-form-->
            </div>
         </div>
         <!-- /col-lg-->
         <div class="text-center col-lg-5 res-margin">
            <h3>Get in Touch</h3>
            <p>We are always happy to hear from you. Drop us a message!</p>
            <hr><br><br><br>
            <!-- contact icons-->
            <h5>
               <a href="mailto:{{ ENV('SUPPORT_EMAIL') }}">
                  <b>Email: </b><i class="fa fa-envelope margin-icon"></i>{{ ENV('SUPPORT_EMAIL') }}
               </a>
            </h5>
            <hr>
            <h5>
               <a href="mailto:{{ ENV('SUPPORT_EMAIL') }}">
                  <b>Phone: </b><i class="fa fa-phone margin-icon"></i>{{ ENV('PHONE_NUMBER') }}
               </a>
            </h5>
            <hr>
            <h5>
               <a href="mailto:{{ ENV('SUPPORT_EMAIL') }}">
                  <b>Address: <i class="fa fa-map-marker margin-icon"></i>{{ ENV('ADDRESS') }}
               </a>
            </h5>
            <!-- /list-->
         </div>
      </div>
      <!-- /row-->
   </div>
   <!-- /container-->
</section>