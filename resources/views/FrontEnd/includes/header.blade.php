<div class="sticky-header main-bar-wraper navbar-expand-lg">
    <div class="main-bar clearfix">
        <!-- Message changes -->
        <div class="container clearfix">
            <!-- website logo -->
            <div class="logo-header mostion">
            
                <!--<h1 style="color:blue;">JobsDoor</h1>-->
                <a href="index-2.html"><img style="width: 100%" src="{{URL::asset('assets/images/JobsDoor_Logo.png')}}" class="logo" alt=""></a>
            </div>
            <!-- nav toggle button -->
            <!-- nav toggle button -->
            <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <!-- extra nav -->
            <!--div class="extra-nav">
                <div class="extra-cell" hidden>
                    <a href="{{url('login')}}" class="site-button"><i class="fa fa-lock"></i> login</a>
                </div>
            </div-->
            <!-- Quik search -->
            <div class="dez-quik-search bg-primary">
                <form action="#">
                    <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                    <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                </form>
            </div>
            <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                <div class="logo-header mostion"></div>
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="{{url('/')}}">Home </a>
                    </li>
                    <li class="">
                        <a href="{{url('employer')}}">Employer Registration</a>
                    </li>
                    <li class="">
                        <a href="#">For Candidates <i class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{url('regf')}}">Candidate Registration</a></li>
                            <li><a href="{{url('browes-job')}}" class="dez-page">Browse Job</a></li>
                            
                        </ul> 
                    </li>
                     <li class="">
                        <a href="{{url('about')}}">About Us</a>                       
                    </li>
                </ul>           
            </div>
        </div>
    </div>
</div>