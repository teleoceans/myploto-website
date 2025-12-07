
<!-- ==== Newsletter - call to action ==== -->
<div class="container-fluid footer-bg block-padding overlay">
   <div class="container">
      <div class="col-lg-5 text-light text-center">
         <h4>Subscribe to our newsletter</h4>
         <p>We send emails once a month, we never send Spam!</p>
         <!-- Form -->				
         <div id="mc_embed_signup" >
            <!-- your form address in the line bellow -->
		<form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate> 
		<div class="mc-field-group">
                     <div class="input-group">
                        <input class="form-control border2 input-lg required email" type="email" value="" name="EMAIL" placeholder="Your email here" id="mce-EMAIL">
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                        </span>
                     </div>
                     <!-- Subscription results -->
                     <div id="mce-responses" class="mailchimp">
                        <div class="alert alert-danger response" id="mce-error-response"></div>
                        <div class="alert alert-success response" id="mce-success-response"></div>
                     </div>
                  </div>
                  <!-- /mc-fiel-group -->									
               </div>
               <!-- /mc_embed_signup_scroll -->
            </form>
            <br><br><br>
            <!-- /form ends -->								
         </div>
         <!-- /mc_embed_signup -->
      </div>
      <!--/ col-lg-->
   </div>
   <!--/ container-->
</div>
<!--/container-fluid-->
<!-- ==== footer ==== -->
<footer class="bg-light pattern1">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 text-center ">
            <img src="/img/logo.png"  class="logo-footer img-fluid" alt=""/>
            <!-- Start Social Links -->
            <ul class="social-list text-center list-inline">
               <li class="list-inline-item"><a title="Facebook" href="https://www.facebook.com/My.Ploto.Pet.Services.UAE.2/"><i class="fab fa-facebook-f"></i></a></li>
               <li class="list-inline-item"><a title="TikTok" href="https://www.tiktok.com/@myploto"><i class="fab fa-tiktok"></i></a></li>
               <li class="list-inline-item"><a  title="Instagram" href="https://www.instagram.com/myploto/"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a  title="SnapChat" href="https://www.snapchat.com/add/myploto?sender_web_id=d5cc3316-0867-47fa-8419-f51b9714c91e&device_type=desktop&is_copy_url=true"><i class="fab fa-snapchat"></i></a></li>

            </ul>
            <!-- /End Social Links -->
         </div>
         <!--/ col-lg -->
         <div class="col-lg-3">
            <h5>About us</h5>
            <!--divider -->
            <hr class="small-divider left"/>
            <p class="mt-3">MyPloto is a pet caring service provider located in Dubai with a solid vision to build a strong and unique brand in the pet service provider market in all United Arab Emirates.</p>
         </div>
         <!--/ col-lg -->
         <div class="col-lg-3">
            <h5>Contact Us</h5>
            <!--divider -->
            <hr class="small-divider left"/>
            <ul class="list-unstyled mt-3">
               <li class="mb-1"><i class="fas fa-phone margin-icon "></i>{{ ENV('PHONE_NUMBER') }}</li>
               <li class="mb-1"><i class="fas fa-envelope margin-icon"></i><a style="color: #6f6f6f" href="mailto:{{ ENV('SUPPORT_EMAIL') }}">{{ ENV('SUPPORT_EMAIL') }}</a></li>
               <li><i class="fas fa-map-marker margin-icon"></i>{{ ENV('ADDRESS') }}</li>
            </ul>
            <!--/ul -->
         </div>
         <!--/ col-lg -->
         <div class="col-lg-3">
            <h5>Useful Links</h5>
            <!--divider -->
            <hr class="small-divider left"/>
            <ul class="list-unstyled mt-3">
               <li class="mb-1"><a style="color: #6f6f6f" href="{{ route('pages.services', 1) }}">Book Now!</a></li>
               <li class="mb-1"><a style="color: #6f6f6f" href="{{ route('pages.contact') }}">Contact Us</a></li>
               <li class="mb-1"><a style="color: #6f6f6f" href="{{ route('pages.download') }}">Download Apps</a></li>
               <li class="mb-1"><a style="color: #6f6f6f" href="{{ route('pages.about') }}">About Us</a></li>
            </ul>
            <!--/ul -->
         </div>
         <!--/ col-lg -->
      </div>
      <!--/ row-->
      <hr/>
      <div class="row">
         <div class="credits col-sm-12">
            <p>Copyright @php echo date('Y') @endphp &copy; - All Rights Reserved - Powered by <a href="https://artefy.ai">Artefy.ai</a></p>
            <p style="display: none">teleoceans.com</p>
         </div>
      </div>
      <!--/col-lg-12-->
   </div>
   <!--/ container -->
   <!-- Go To Top Link -->
   <div class="page-scroll hidden-sm hidden-xs">
      <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
   </div>
   <!--/page-scroll-->
</footer>
<!--/ footer-->