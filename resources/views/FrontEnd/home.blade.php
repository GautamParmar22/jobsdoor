@extends('FrontEnd.master')
@section('aboute')
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/css/skin/skin-1.css">
	<link rel="stylesheet" href="http://localhost/JobsDoor/public/assets/plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/plugins/revolution/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/plugins/revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/JobsDoor/public/assets/plugins/revolution/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->
    <style>
        dt {
            float: left;
            clear: left;s
            width: 110px;
            font-weight: bold;
        }
        dt::after {
            content: ":";
        }
        dd {
            margin: 0 0 0 80px;
            padding: 0 0 0.5em 0;
        }
    </style>
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(http://localhost/JobsDoor/public/assets/images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">About Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-block">
        <div class="section-full content-inner overlay-white-middle">
            <div class="container">
                <div class="row align-items-center m-b50">
                    <div class="col-md-12 col-lg-6 m-b20">
                      <h2 class="m-b5">About Us</h2>
                        <h3 class="fw4">
                         JobsDoor.com is reinventing the recruiting industry by offering assistance in much needed areas and easing up the overall process.
                        </h3>
                        <a href="#" class="site-button">Read More</a>
                        <!--<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</p>
                        <p class="m-b15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</p> -->
                
                        <div id="abouts" class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap" >
                            <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                                Website
                            </dt>
                            <dd class="font-sans text-md text-color-text break-words">
                                   
                          <a class="link-no-visited-state hover:no-underline" data-tracking-control-name="about_website" href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Esiyatta%2Ecom%2F&amp;urlhash=yD8Q&amp;trk=about_website" target="_blank" rel="noopener" data-tracking-will-navigate aria-label="External link for siyatta1-com">
                            https://www.jobsdoor.com/
                            <icon class="align-middle" data-delayed-url="https://static-exp1.licdn.com/sc/h/49229g4q0jsla5l1xojq1wob9" aria-hidden="true"></icon>
                          </a>       
                            </dd>
                          </div>   
                          <div class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap">
                            <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                                Industries
                            </dt>
                            <dd class="font-sans text-md text-color-text break-words">
                                        Staffing and Recruiting
                            </dd>
                          </div>  
                          <div class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap">
                            <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                                Company size
                            </dt>
                            <dd class="font-sans text-md text-color-text break-words">
                                11-15 employees
                            </dd>
                          </div>
                          <div class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap">
                            <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                               Type
                            </dt>
                            <dd class="font-sans text-md text-color-text break-words">
                                Privately Held 
                            </dd>
                          </div>  
                          <div class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap">
                            <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                                Founded
                            </dt>
                            <dd class="font-sans text-md text-color-text break-words">
                                 2022 
                            </dd>
                          </div> 
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <img src="images/our-work/pic1.jpg" alt=""/>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footer')
<!-- Footer Section Start-->
<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <!--<h1 style="color:blue;">JobsDoor</h1>-->
                        <img src="images/JobsDoor_Logo.png" width="180" class="m-b15" alt=""/>
                        <p class="text-capitalize m-b20">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the..</p>
                        <div class="subscribe-form m-b20">
                            <form class="dzSubscribe" action="http://job-board.w3itexperts.com/xhtml/script/mailchamp.php" method="post">
                                <div class="dzSubscribeMsg"></div>
                                <div class="input-group">
                                    <input name="dzEmail" required="required"  class="form-control" placeholder="Your Email Id" type="email">
                                    <span class="input-group-btn">
                                        <button name="submit" value="Submit" type="submit" class="site-button radius-xl">Subscribe</button>
                                    </span> 
                                </div>
                            </form>
                        </div>
                        <ul class="list-inline m-a0">
                            <li><a href="https://www.facebook.com//" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/" class="site-button white google-plus circle "><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.linkedin.com/" class="site-button white linkedin circle "><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com" class="site-button white twitter circle "><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">Frequently Asked Questions</h5>
                        <ul class="list-2 list-line">
                            <li><a href="#">Privacy & Seurty</a></li>
                            <li><a href="#">Terms of Serice</a></li>
                            <li><a href="#">Communications</a></li>
                            <li><a href="#">Referral Terms</a></li>
                            <li><a href="#">Lending Licnses</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">How It Works</a></li>
                            <li><a href="#">For Employers</a></li>
                            <li><a href="#">Underwriting</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Lending Licnses</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">Find Jobs</h5>
                        <ul class="list-2 w10 list-line">
                            <li><a href="#">US Jobs</a></li>
                            <li><a href="#">Canada Jobs</a></li>
                            <li><a href="#">UK Jobs</a></li>
                            <li><a href="#">Emplois en Fnce</a></li>
                            <li><a href="#">Jobs in Deuts</a></li>
                            <li><a href="#">Vacatures China</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
           <div class="row">
                <div class="col-lg-12 text-center"><span><a target="_blank" href="https://www.templateshub.net">JobsDoor</a></span></div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End-->
@endsection