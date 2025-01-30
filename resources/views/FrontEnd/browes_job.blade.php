@extends('Frontend.layouts.default')
@section('content')
<style type="text/css">
	.more_info.open {
    display: block !important;
}
</style>
<div class="page-content bg-white">
	@csrf
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url('{{URL::asset('assets/images/banner/bnr1.jpg')}}');" >
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Browse Jobs</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="javascript:void(0)">Home</a></li>
							<li>Browse Jobs</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job content-inner-2">
				<div class="container">
					<div class="row" id="main" >
						<?php //echo "<pre/>";print_r($browesalljob);dd();?>
						<div class="col-xl-9 col-lg-8">
							<h5 class="widget-title font-weight-700 text-uppercase">Recent Jobs</h5>
							
							<ul class="post-job-bx" id="put_data">
									@foreach($browesalljob as $browes)
									   <li >
											<a href="javascript:void(0)" id="main_details">
												<div class="d-flex m-b30">
													<div class="job-post-company">
														<span><img src="{{URL::asset('assets/images/logo/icon1.png')}}"/></span>
													</div>
													<div class="job-post-info">
														<h4>{{$browes->job_name}}</h4>
														
														<ul>
															<li><i class="fa fa-map-marker"></i>{{$browes->location}}</li>
															<li><i class="fa fa-bookmark"></i>{{$browes->type_of_job}}</li>
															<li><i class="fa fa-user"></i>{{$browes->no_of_vacancy}}</li>
															<!--li><i class="fa fa-clock-o"></i> Published 11 months ago</li-->
														</ul>
													</div>

												</div>
												<div class="d-flex">
													<div class="job-time mr-auto">
														<span>{{$browes->type_of_job}}</span>
													</div>
													<div class="salary-bx">
														<span>₹{{$browes->salary_to}} - ₹{{$browes->salary_from}}</span>
													</div>
												</div>
												<span class="post-like infobtn">
													<i class="fas fa-angle-down" aria-hidden="true" style="color:blue; display: inline-block;"></i>
													
												</span>
												<div class="more_info" style="display: none;">
															<div class="panel" style="color: black;" >
												    			 <div class="mb-2"><b>Job name: </b>{{$browes->job_name}}</div>
														    	 <div class="mb-2"><b>No of vacancy:  </b>{{$browes->no_of_vacancy}}</div>
																 <div class="mb-2"><b>Type of job:  </b>{{$browes->type_of_job}}</div>
														         <div class="mb-2"><b>Description of job:  </b>{{$browes->job_description}}</div>
														         <div class="mb-2"><b>Key skills:  </b>{{$browes->key_skills}}</div>
														         <div class="mb-2"><b>Qualification:  </b>{{$browes->qualification}}</div>
														         <div class="mb-2"><b>Location:  </b>{{$browes->location}}</div>
															</div>
															
													</div>
												</a>
												<a href="{{url('job-info/'.base64_encode($browes->id))}}" id="link_to_details" style="display: none;"><button name="moreDetails" value="Submit" type="submit" class="site-button radius-xl moreDetails" data-id="{{$browes->id}}">More Details</button></a>
											</li>
									@endforeach
							</ul>
							
							<div class="pagination-bx m-t30">
								<ul class="pagination">
									<li class="previous" style=" margin: auto; width: 25%; border: 3px solid blue; padding: 10px;"><a href="javascript:void(0)"><i class="ti-arrow-left"></i> Prev</a></li>
								<li class="next" style=" margin: auto; width: 25%; border: 3px solid blue; padding: 10px;"><a href="javascript:void(0)">Next <i class="ti-arrow-right"></i></a></li>
								</ul>
							</div>
						</div>

						<div class="col-xl-3 col-lg-4">
							@csrf
							<div class="sticky-top">
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Keywords</h5>
									<div class="">
										<input type="text" class="form-control" placeholder="Search" name="search_by" id="search_by">
									</div>
								</div>
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Job type</h5>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-6">
											<div class="product-brand">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input cutom_click" id="freelance_chb" name="example1[]" value="freelance">
													<label class="custom-control-label" for="freelance_chb" id="jobtypelbl1" style=" padding: 2px 5px 7px 25px;">Freelance</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input cutom_click" id="fulltime_chb" name="example1[]" value="fulltime">
													<label class="custom-control-label" for="fulltime_chb" style=" padding: 2px 5px 7px 25px;">FullTime</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input cutom_click" id="parttime_chb" name="example1[]" value="parttime">
													<label class="custom-control-label" for="parttime_chb" style=" padding: 2px 5px 7px 25px;">PartTime</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input cutom_click" id="internship_chb" name="example1[]" value="internship">
													<label class="custom-control-label" for="internship_chb" style=" padding: 2px 5px 7px 25px;">Internship</label>
												</div>												
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input cutom_click" id="temporary_chb" name="example1[]" value="temparary">
													<label class="custom-control-label" for="temporary_chb" style=" padding: 2px 5px 7px 25px;">Temporary</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								 <div class="clearfix">
									<h5 class="widget-title font-weight-700 text-uppercase">Induatry</h5>
									<select id="industry" name="industry">
										<option>IT</option>
										<option>Web Devlopment</option>
										<option>Data Science</option>
										<option>Image Processing</option>
										<option>Food Services</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    
<input type="hidden" name="page" value="1" id="page_number">
<script>
	$(document).ready(function(){

		$(document).on('click', '.infobtn',function(){
			    if ($(this).next().hasClass('open'))
			    {
			        $('#put_data').find('li a#main_details .more_info').removeClass('open');
			        $('#put_data').find('li a#main_details.infobtn i').attr('class','fas fa-angle-down');
			        $('#put_data').find('li #link_to_details').hide();
			        //$(this).find('i').attr('class','fas fa-angle-down');
			    } else {
			         $('#put_data').find('li a#main_details .more_info').removeClass('open');
			         $('#put_data').find('li a#link_to_details').hide();
			        
			         $(this).next().addClass('open');
			        $('#put_data').find('li a#main_details .infobtn i').attr('class','fas fa-angle-down');
			        $(this).find('i').attr('class','fas fa-angle-up');
			        
			        $(this).parents('#main_details').next().show();
			    }	  
			});

			/*$(document).on('click', '.moreDetails',function(){
			     //alert($(this).attr("data-id"));
			    var id = $(this).attr("data-id")
			    location.href='job-info/'+id;
			});*/
		 
        var app_url = "<?php echo env('APP_URL'); ?>";
        $('#search_by').on('keyup', function(){
        	var details = getCheckboxValue();
        	//console.log(details);
        	var myJSON = JSON.stringify(details);
        	console.log(myJSON);
            //var searchBy = $('#search_by').val();
           $.ajax({
                type:"post",
                url:app_url+'search-job',
                data: {mydata:myJSON},
                async:false,
                headers: {
			        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
			    },
                success: function(response) {
                	//console.log(response.browesjobresult);
                    $('#put_data').html(response.browesjobresult);
                    
                 }
            });

        });

        $('.cutom_click').on('change',function(){
        		//alert();
        	var details = getCheckboxValue();
        	////console.log(details);
        	var myJSON = JSON.stringify(details);
        	console.log(myJSON);
        	$.ajax({
                type:"post",
                url:app_url+'search-job',
                data: {mydata:myJSON},
                async:false,
                headers: {
			        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
			    },
                success: function(response) {
                	//console.log(response.browesjobresult);
                    $('#put_data').html(response.browesjobresult);
                    
                 }
            });
            
        });

        $('#industry').on('change',function(){
			var details = getCheckboxValue();
        	//console.log(details);
        	var myJSON = JSON.stringify(details);
        	console.log(myJSON);
            //var searchBy = $('#search_by').val();
           $.ajax({
                type:"post",
                url:app_url+'search-job',
                data: {mydata:myJSON},
                async:false,
                headers: {
			        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
			    },
                success: function(response) {
                	//console.log(response.browesjobresult);
                    $('#put_data').html(response.browesjobresult);
                    
                 }
            });

           
        });

         
        $(document).on('click', '.previous',function()
        {
            $(this).parent('.previous').addClass('active');
            var page = $('#page_number').val();
            var paged = '';
            if(page>0){
            	
            	paged = parseInt(page)-parseInt(1);
            } else{
            	paged=1;
            }
            $('#page_number').attr('value',paged);
            var details = getCheckboxValue();
        	var myJSON = JSON.stringify(details);

        	$.ajax({
                type:"post",
                url:app_url+'search-job',
                data: {mydata:myJSON,page:paged},
                async:false,
                headers: {
			        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
			    },
                success: function(response) {
                	//console.log(response.browesjobresult);
                   $('#put_data').html(response.browesjobresult);                    
                 }
            });
        });

        $(document).on('click', '.next',function()
        {
            $(this).parent('.next').addClass('active');
            var page = $('#page_number').val();
            var paged = '';
            if(page>0){
            	paged = parseInt(page)+parseInt(1);
            } else{
            	paged=1;
            }
            console.log('page = '+paged);
            $('#page_number').attr('value',paged);
            var details = getCheckboxValue();
        	var myJSON = JSON.stringify(details);
        	$.ajax({
                type:"post",
                url:app_url+'search-job',
                data: {mydata:myJSON,page:paged},
                async:false,
                headers: {
			        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
			    },
                success: function(response) {
                	//console.log(response.browesjobresult);
                    console.log(response.status);
                    if(response.status==0){
                    	swal({
						  title: "",
						  text: "In the next page Job Post is not exist!",
						  icon: "warning",
						  button: "OK",
						});
                    }else{
                    	$('#put_data').html(response.browesjobresult);
                    	
                    }
                 }
            });
           
        });

     
     function getCheckboxValue(){
     	var arr = [];
       $('.cutom_click:checked').each(function () {
           //arr[] = $(this).val();
           var obj12 = {};
           obj12 = $(this).val();
           arr.push(obj12);
       });
       console.log(arr);

       var search_val = $('#search_by').val();
       var industry = $('#industry').val();
       var obj = {};
       var obj1 = {};
       var arr1 = [];
       var arr2 = [];
       obj['search_val'] = search_val;
       obj1['industry'] = industry;
	   arr1.push(obj);
	   arr2.push(obj1);	    
	     var main_arr = [arr,arr1[0],arr2[0]];	     
	     	return  main_arr;
     }	
    });
</script>
@stop