 <!-- header-start -->
 <header>
     <div class="header-area ">
         <div class="header-top_area d-none d-lg-block">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-xl-5 col-md-5 ">
                         <div class="header_left">
                             <p>Opening Hour: (10.00-07.00)</p>
                         </div>
                     </div>
                     <div class="col-xl-7 col-md-7">
                         <div class="header_right d-flex justify-content-end">
                             <a href="{{ route('contact') }}" class="boxed-btn3">Get a Quote</a>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
         <div class="address_bar d-none d-lg-block">
             <div class="container">
                 <div class="row justify-content-between align-items-center">
                     <div class="col-xl-3 col-lg-3">
                         <div class="logo">
                             <a href="index.html">
                                 <img src="img/ke_logo.jpeg" alt="main logo"
                                     style="width:300px;height:70px;border-radius:5px;">
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-9">
                         <div class="address_menu d-flex justify-content-end">
                             <div class="single_address  d-flex">
                                 <div class="icon">
                                     <img src="img/icon/header-address.svg" alt="">
                                 </div>
                                 <div class="address_info">
                                     <h3>Address</h3>
                                     <p>20/D, Kings road, Green lane</p>
                                 </div>
                             </div>
                             <div class="single_address d-flex">
                                 <div class="icon">
                                     <img src="img/icon/headset.svg" alt="">
                                 </div>
                                 <div class="address_info">
                                     <h3>Call Us</h3>
                                     <p>+10 673 567 367</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div id="sticky-header" class="main-header-area">
             <div class="container">
                 <div class="white_bg_bar">
                     <div class="row align-items-center">
                         <div class="col-12 d-lg-none">
                             <div class="logo ">
                                 <a href="#">
                                     <img src="img/ke_logo.jpeg" alt="">
                                 </a>
                             </div>
                         </div>
                         <div class="col-xl-8 col-lg-8">
                             <div class="main-menu  d-none d-lg-block">
                                 <nav>
                                     <ul id="navigation">
                                         <li><a class="active" href="{{ route('home') }}">home</a></li>
                                         <li><a href="{{ route('about') }}">About</a></li>
                                         <li><a href="{{ route('services') }}">Services</a></li>
                                         <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                             <ul class="submenu">
                                                 <li><a href="{{ route('project') }}">project</a></li>
                                                 <li><a href="{{ route('elements') }}">elements</a></li>
                                                 <li><a href="{{ route('project-details') }}">project details</a></li>
                                             </ul>
                                         </li>
                                         <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                             <ul class="submenu">
                                                 <li><a href="{{ route('blog') }}">blog</a></li>
                                                 <li><a href="{{ route('single-blog') }}">single-blog</a></li>
                                             </ul>
                                         </li>
                                         <li><a href="{{ route('contact') }}">Contact</a></li>
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                         <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                             <div class="Appointment d-flex justify-content-end">
                                 <div class="search_icon">
                                     <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                         <i class="ti-search"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mobile_menu d-block d-lg-none">
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </header>
 <!-- header-end -->
