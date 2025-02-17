@extends('Frontend.layouts.default')
@section('content')

<div class="page-content">
	<!-- Section Banner -->
	<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url('{{URL::asset('assets/images/main-slider/slide2.jpg')}}');">
        <div class="container">
            <div class="dez-bnr-inr-entry align-m ">
				<div class="find-job-bx">
					<div>
                        <h1>WELCOME TO JobsDoor!</h1> <br>
                        <h3>
                            The ultimate home of elite talent acquisition & career advancement
                       	</h3>
                       	<h2>
                        	Your dream career is a few clicks away!
                       	</h2>
                	</div>
                </div>
			</div>
		</div>
	</div>
</div>
    
<!-- Our Job END -->	
<!-- Call To Action --> 
<div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" style="background-image: url('{{URL::asset('assets/images/background/bg4.jpg')}}');">
	<div class="container">
		<div class="section-head text-center text-white">
			<h2 class="m-b5">Testimonials</h2>
			<h5 class="fw4">Few words from candidates</h5>
		</div>
		<div class="blog-carousel-center owl-carousel owl-none">
			<div class="item">
				<div class="testimonial-5">
					<div class="testimonial-text">
						<p>You Can directly register this website...</p>
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-pic radius shadow">
							<img src="{{URL::asset('assets/images/testimonials/pic1.jpg')}}" width="100" height="100" alt="">
						</div>
						<strong class="testimonial-name">David Matin</strong> 
						<span class="testimonial-position">Student</span> 
					</div>
				</div>
			</div>
			<div class="item">
				<div class="testimonial-5">
					<div class="testimonial-text">
						<p>This is good website for jobseeker and unemploted persons...</p>
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-pic radius shadow">
							<img src="{{URL::asset('assets/images/testimonials/pic2.jpg')}}" width="100" height="100" alt="">
						</div>
						<strong class="testimonial-name">David Matin</strong> 
						<span class="testimonial-position">Student</span> 
					</div>
				</div>
			</div>
			<div class="item">
				<div class="testimonial-5">
					<div class="testimonial-text">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-pic radius shadow">
							<img src="{{URL::asset('assets/images/testimonials/pic3.jpg')}}" width="100" height="100" alt="">
						</div>
						<strong class="testimonial-name">David Matin</strong> 
						<span class="testimonial-position">Student</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop