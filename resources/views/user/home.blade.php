 @extends('user.partials.master')

 @section('content')
     <!-- start banner Area -->
     <section class="banner-area">
         <div class="container">
             <div class="row fullscreen align-items-center justify-content-start">
                 <div class="col-lg-12">
                         <!-- single-slide -->
                         <div class="row single-slide align-items-center d-flex">
                             <div class="col-lg-5 col-md-6">
                                 <div class="banner-content">
                                     <h1>Pengiriman<br>Super Cepat!</h1>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                         incididunt ut labore et
                                         dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                 </div>
                             </div>
                             <div class="col-lg-7">
                                 <div class="banner-img">
                                     <img class="img-fluid" src="{{ asset('assets/home/img/courier.png') }}" alt=""
                                         style="margin-top:145px; margin-left:200px; width:67%; height:67%;">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
     </section>
     <!-- End banner Area -->

     <!-- start features Area -->
     <section class="features-area section_gap">
         <div class="container">
             <div class="row features-inner">
                 <!-- single features -->
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="single-features">
                         <div class="f-icon">
                             <img src="{{ asset('assets/home/img/features/f-icon1.png') }}" alt="">
                         </div>
                         <h6>Free Delivery</h6>
                         <p>Free Shipping on all order</p>
                     </div>
                 </div>
                 <!-- single features -->
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="single-features">
                         <div class="f-icon">
                             <img src="{{ asset('assets/home/img/features/f-icon2.png') }}" alt="">
                         </div>
                         <h6>Return Policy</h6>
                         <p>Free Shipping on all order</p>
                     </div>
                 </div>
                 <!-- single features -->
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="single-features">
                         <div class="f-icon">
                             <img src="{{ asset('assets/home/img/features/f-icon3.png') }}" alt="">
                         </div>
                         <h6>24/7 Support</h6>
                         <p>Free Shipping on all order</p>
                     </div>
                 </div>
                 <!-- single features -->
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="single-features">
                         <div class="f-icon">
                             <img src="{{ asset('assets/home/img/features/f-icon4.png') }}" alt="">
                         </div>
                         <h6>Secure Payment</h6>
                         <p>Free Shipping on all order</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- end features Area -->
     <!-- Start brand Area -->
     <section class="brand-area section_gap">
         <div class="container">
             <div class="row">
                 <a class="col single-img" href="#">
                     <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/brand/1.png') }}" alt="">
                 </a>
                 <a class="col single-img" href="#">
                     <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/brand/2.png') }}" alt="">
                 </a>
                 <a class="col single-img" href="#">
                     <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/brand/3.png') }}" alt="">
                 </a>
                 <a class="col single-img" href="#">
                     <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/brand/4.png') }}" alt="">
                 </a>
                 <a class="col single-img" href="#">
                     <img class="img-fluid d-block mx-auto" src="{{ asset('assets/home/img/brand/5.png') }}" alt="">
                 </a>
             </div>
         </div>
     </section>
     <!-- End brand Area -->
     @include('sweetalert::alert')
 @endsection
