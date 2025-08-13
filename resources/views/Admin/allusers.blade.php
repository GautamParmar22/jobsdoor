@extends('Admin.layout.default')
@section('content')
    <div class="app-wrapper">
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
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">		    	
			     <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">All Users</h1>
				    </div>
				  </div><!--//row-->
			    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
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
											@foreach( $alluserdata as $alldata)
												<tr>												
													<td class="cell"><span class="truncate">{{@$alldata->name}}</span></td>
													<td class="cell">{{@$alldata->email}}</td>
													<td class="cell">
														  <span>
																<?php
																 if(@$alldata->role_type==2 ){echo "Employer" ;}else{echo "Candidate";}
																?>
														 </span>
													</td>
													<td class="cell">
														<span>
															<?php
															  if(@$alldata->role_type==2 ){ echo @$alldata->emp_mobile; }else{ echo @$alldata->cnd_mobile; }
															?>
														</span>
													</td>
													<td class="cell">
														<span>
															<?php 
															    if(empty(@$alldata->official_title)){echo "--";}else{echo @$alldata->official_title;}
															?>
														</span>
													</td>
													<td class="cell">
														<?php
															if(@$alldata->status){
																echo '<span class="badge bg-success">Active</span>';
															}else{
																echo '<span class="badge bg-danger">Inactive</span>';
															}
														?>
													</td>
													<td class="cell">
														<?php if(@$alldata->role_type == 2){ ?>
															<a href="{{url('view-employers/'.base64_encode(@$alldata->id))}}"><i class="fa fa-eye" aria-hidden="true" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a>
														<?php } else { ?>
															<a href="{{url('view-candidate/'.base64_encode(@$alldata->id))}}"><i class="fa fa-eye" aria-hidden="true" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a>
														<?php } ?>

														<?php if(@$alldata->role_type == 2){ ?>
															<a href="{{url('edit-employer/'.@$alldata->id)}}"><i class="fa fa-edit" aria-hidden="true" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a>
														<?php } else { ?>
															<a href="{{url('edit-candidate/'.@$alldata->id)}}"><i class="fa fa-edit" aria-hidden="true" style="color:gray; display: inline-block; margin: 0 10px 0 0; font-size: 1.2em;"></i></a>
														<?php } ?>
														
												         <?php if(@$alldata->role_type == 2){ ?>
															<a href="{{url('delete-users/'.@$alldata->id)}}" onclick="alert('Are you sure to Delete ?');"><i class="fa fa-trash" style="color:gray; font-size: 1.2em;"></i> </a>
														<?php } else { ?>
															<a href="{{url('delete-candidates/'.@$alldata->id)}}" style="color:gray; font-size: 1.2em;" onclick="alert('Are you sure to Delete ?');"><i class="fa fa-trash"></i></a>
														<?php } ?>
									
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