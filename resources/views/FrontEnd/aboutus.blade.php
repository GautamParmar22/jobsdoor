@extends('Frontend.layouts.default')
@section('content')
<div class="page-content bg-white">
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url('{{URL::asset('assets/images/banner/bnr1.jpg')}}');">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">About Us</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <div class="section-full content-inner overlay-white-middle">
                <div class="container">
                    <div class="row align-items-center m-b50">
                        <div class="col-md-12 col-lg-12 m-b20" >
                          <h2 class="m-b5">About Us</h2>
                            <h3 class="fw4">
                                JobsDoor is reinventing the recruiting industry by offering assistance in much needed areas and easing up the overall process.
                            </h3>                
                                <div id="abouts" class="mb-2 flex papabear:mr-3 mamabear:mr-3 babybear:flex-wrap" >
                                    <dt class="font-sans text-md font-bold text-color-text break-words w-40 papabear:flex-shrink-0 papabear:mr-3 mamabear:flex-shrink-0 mamabear:mr-3 babybear:mb-1">
                                        Website
                                    </dt>
                                    <dd class="font-sans text-md text-color-text break-words">
                                        <a class="link-no-visited-state hover:no-underline" data-tracking-control-name="about_website" href="#" target="_blank" rel="noopener" data-tracking-will-navigate aria-label="External link for jobsdoor1-com">
                                         jobsdoor
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
                                         2020 
                                    </dd>
                                  </div>
                       </div>
                    </div>
                </div>
            </div>
       </div>
</div>
@stop
