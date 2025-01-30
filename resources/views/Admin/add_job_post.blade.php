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
					    <div class="row g-3 mb-4 align-items-center justify-content-between">
						    <div class="col-auto">	
					            <h1 class="app-page-title mb-0">Job Post List</h1>
						    </div>
						    <a href="{{url('job-post')}}" align="right"><button type="button" class="btn btn-primary">Add Job Post</button></a>
					    </div><!--//row-->
			    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							    	<?php //echo "<pre/>"; print_r($job_posts); ?>
							        <table id="users" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Job name</th>
												<th class="cell">No of vacancy</th>
												<th class="cell">Type of job</th>
												<th class="cell">Description of job</th>
												<th class="cell">Key skill</th>
												<th class="cell">Qualification</th>
												<th class="cell">Salary</th>
												<th class="cell">Location</th>
												<th class="cell">Describe PDF</th>												
												<th class="cell">Status</th>
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
											 @foreach( $job_posts as $post)
												<tr>												
													<td class="cell">{{$post->job_name}}</td>
													<td class="cell">{{$post->no_of_vacancy}}</td>
													<td class="cell">{{$post->type_of_job}}</td>
													<td class="cell">{{$post->job_description}}</td>
													<td class="cell">{{$post->key_skills}}</td>
													<td class="cell">{{$post->qualification}}</td>
													<td class="cell">{{$post->salary_to}}</td>
													<td class="cell">{{$post->location}}</td>
													<td class="cell">{{$post->indroduction_pdf}}</td>
													<td class="cell">
														<?php
															if($post->status){
																echo '<span class="badge bg-success">Active</span>';
															}else{
																echo '<span class="badge bg-danger">Inactive</span>';
															}
														?>
													</td>
													<td class="cell">
														<a href="{{url('view-job-post/'.base64_encode($post->id))}}"><i class="fa fa-eye" aria-hidden="true" style="color:gray; display: inline-block;"></i></a> 
														<a href="{{url('edit-job-post/'.base64_encode($post->id))}}" style="color:gray; display: inline-block;"><i class="fa fa-edit"></i></a>
														<a href="{{url('delete-job-post/'.base64_encode($post->id))}}" onclick="alert('Are you sure to Delete ?');"><i class="fa fa-trash" style="color:gray; display: inline-block;"></i></a>
													</td>
											    </tr>
											   @endforeach
										</tbody>
									</table>
						       </div><!--//table-responsive-->
					        </div><!--//app-card-body-->		
						</div><!--//app-card-->						
			        </div><!--//tab-pane-->
			    </div><!--//tab-content-->  
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->    
    </div><!--//app-wrapper-->    					
 @stop
@section('pages.separate_script')
<script type="text/javascript">
	$("#users").DataTable();
</script>
@stop

