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
					            <h1 class="app-page-title mb-0">Employers</h1>
						    </div>
					    </div><!--//row-->
			    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							    	<?php //echo "<pre/>"; print_r($allemployers);die; ?>
							        <table id="users" class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Name</th>
												<th class="cell">Email</th>
												<th class="cell">Role Type</th>
												<th class="cell">Phone</th>
												<th class="cell">Official Title</th>
												<th class="cell">Status</th>
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($allemployers as $allemp)
												<tr>												
													<td class="cell"><span class="truncate">{{$allemp->name}}</span></td>
													<td class="cell">{{$allemp->email}}</td>
													<td class="cell"><span>Employer</span></td>
													<td class="cell"><span><?php echo $allemp->emp_mobile; ?></span></td>
													<td class="cell"><span><?php if($allemp->official_title == ""){echo "--";}else{echo $allemp->official_title;}?></span></td>
													<td class="cell">
														<?php
															if($allemp->status){
																echo '<span class="badge bg-success">Active</span>';
															}else{
																echo '<span class="badge bg-danger">Inactive</span>';
															}
														?>
													</td>
													<td class="cell">
														<a href="{{url('view-employers/'.base64_encode($allemp->id))}}"><i class="fa fa-eye" aria-hidden="true" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a> 
														<a href="{{url('edit-employer/'.$allemp->id)}}" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"><i class="fa fa-edit"></i></a>
														<a href="{{url('delete-users/'.$allemp->id)}}" onclick="alert('Are you sure to Delete ?');"><i class="fa fa-trash" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a>
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
	$(document).ready(function() {
        $("#users").DataTable();
    });
</script>
@stop