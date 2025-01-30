@extends('Admin.layout.default')
@section('content')	
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">	
	            @if (\Session::has('success'))
			            <div class="alert alert-success" style="display: none;">
			                <ul>
			                    <li id="success-msg">{!! \Session::get('success') !!}</li>
			                </ul>
			            </div>
			     @endif
			     @if (session('error'))
			            <div class="alert alert-danger" style="display: none;">
			                <li id="error-msg">{{ session('error') }}</li>
			            </div>
			     @endif			    
    		<h1 class="app-page-title">Employer Details</h1>
    		<hr class="my-4">
    		<div class="row g-4 settings-section">
        		<div class="col-12 col-md-4">
            		<h3 class="section-title">Personal Details</h3>
        		</div>
        		<div class="col-12 col-md-8">
            		<div class="app-card app-card-settings shadow-sm p-4">
			    		<div class="app-card-body">
			    		     <div class="mb-2"><strong>Name:  </strong>{{$emp_view->name}} </div>
					    	 <div class="mb-2"><strong>Email:  </strong>{{$emp_view->email}} </div>
							 <div class="mb-2"><strong>Role type:  </strong> 
					     	  	<?php 
									if($emp_view->role_type==2 ){echo "Employer" ;}else{echo "Candidate";}
							   	?>
						     </div>
					         <div class="mb-2"><strong>Phone:  </strong>
					     		<?php
								  if($emp_view->role_type==2 ){ echo $emp_view->emp_mobile; }else{ echo '--' ;}
								?>
					         </div>
					         <div class="mb-2"><strong>Official title:  </strong> 
					     	   <?php 
							     if(empty($emp_view)){echo "--";}else{echo $emp_view->official_title;}
							   ?>          
					         </div>
					         <div class="mb-2"><strong>Status:  </strong>
			     	           <?php
								  if($emp_view->status){
									 echo '<span class="badge bg-success">Active</span>';
								   }else{
									echo '<span class="badge bg-danger">Inactive</span>';
								   }
							    ?>
						     </div>
			    		</div><!--//app-card-body-->
					</div><!--//app-card-->
        		</div>
    		</div><!--//row-->
		    <hr class="my-4">
    		<div class="row g-4 settings-section">
        		<div class="col-12 col-md-4">
            		<h3 class="section-title">Company Details</h3>
        		</div>
        		<div class="col-12 col-md-8">
            		<div class="app-card app-card-settings shadow-sm p-4">
			    		<div class="app-card-body">
				    		<div class="mb-2"><strong>Company Name:  </strong>{{ $emp_view->company_name}}</div>
		                    <div class="mb-2"><strong>Industry:  </strong>{{ $emp_view->industry}}</div>
		                    <div class="mb-2"><strong>Company address:  </strong>{{ $emp_view->company_address}}</div>
		                    <div class="mb-2"><strong>City:  </strong> {{ $emp_view->city}}</div>
		                    <div class="mb-2"><strong>State:  </strong> {{ $emp_view->state}}</div>
		                    <div class="mb-2"><strong>Zip code:  </strong> {{ $emp_view->zip_code}}</div>
		                    <div class="mb-2"><strong>Website:  </strong> {{ $emp_view->website}}</div> 
			    		</div><!--//app-card-body-->
					</div><!--//app-card-->
        		</div>
    		</div><!--//row-->
		</div><!--//container-fluid-->
	</div>
</div>	
@stop