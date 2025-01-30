@extends('Admin.layout.default')
@section('content')
<style type="text/css">
.red {
    color: #eb0000;
}
.green{
	color: #7CFC00;
}
</style>    
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		 @if($dashboard_data->role_type == 1)
				<div class="container-xl">
			    <h1 class="app-page-title">Dashboard</h1>   
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
						    	<?php //echo $dashboard_data->role_type; ?>
							    <h4 class="stats-type mb-1">Total Users</h4>
							    <div class="stats-figure">{{$totsluser}}</div>
							    
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Employers</h4>
							    <div class="stats-figure">{{$employer}}</div>
							    
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Candidates</h4>
							    <div class="stats-figure">{{$candidate}}</div>
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
	        <div class="col-12 col-lg-11">
		        <div class="app-card app-card-stats-table h-100 shadow-sm">
			        <div class="app-card-header p-3">
				        <div class="row justify-content-between align-items-center">
					        <div class="col-auto">
				                <h4 class="app-card-title">Recent Users</h4>
					        </div><!--//col-->
					    </div><!--//row-->
			        </div><!--//app-card-header-->
			        <div class="app-card-body p-3 p-lg-4">
				        <div class="table-responsive">
					        <table class="table table-borderless mb-0">
									<thead>
										<tr>
											<th class="meta">Name</th>
											<th class="meta stat-cell">Role type</th>
											<th class="meta stat-cell">Status</th>
										</tr>
									</thead>
									@foreach($recentusers as $recuser)
									   <tbody>
											<tr>
												<td>{{$recuser->name}}</td>
												<td class="stat-cell"><?php if($recuser->role_type==2 ){echo "Employer" ;}else{echo "Candidate";}?></td>
												<td class="stat-cell">
													<?php
														if($recuser->status){
															echo '<span class="badge bg-success">Active</span>';
														}else{
															echo '<span class="badge bg-danger">Inactive</span>';
														}
													?>
												</td>
											</tr>
									   </tbody>
								   @endforeach
							</table>
				        </div><!--//table-responsive-->
			        </div><!--//app-card-body-->
		        </div><!--//app-card-->
	        </div><!--//col-->    
		</div><!--//container-fluid-->
		@else
		<div class="container-xl">
			    <h1 class="app-page-title">Employer Dashboard</h1>   
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
						    	<?php //echo $total_candidate; ?>
						    	<?php //echo $active_candidate; ?>
						    	<?php //echo $inactive_candidate; ?>
							    <h4 class="stats-type mb-1">Total Candidate</h4>
							    <div class="stats-figure">{{$total_candidate}}</div>
							    
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Active Candidates</h4>
							    <div class="stats-figure">{{$active_candidate}}</div>
							    
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Inactive Candidates</h4>
							    <div class="stats-figure">{{$inactive_candidate}}</div>
						    </div><!--//app-card-body-->
						    
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
	        <div class="col-12 col-lg-11">
		        <div class="app-card app-card-stats-table h-100 shadow-sm">
			        <div class="app-card-header p-3">
				        <div class="row justify-content-between align-items-center">
					        <div class="col-auto">
				                <h4 class="app-card-title">Recent Users</h4>
					        </div><!--//col-->
					    </div><!--//row-->
			        </div><!--//app-card-header-->
			        <div class="app-card-body p-3 p-lg-4">
				        <div class="table-responsive">
					        <table class="table table-borderless mb-0">
									<thead>
										<tr>
											<th class="meta">Name</th>
											<th class="meta stat-cell">Role type</th>
											<th class="meta stat-cell">Status</th>
										</tr>
									</thead>
									<?php //echo "<pre/>"; print_r($recent_candidate);die;?>
									@foreach($recent_candidate as $recuser)
									   <tbody>
											<tr>
												<td>{{$recuser->name}}</td>
												<td class="stat-cell"><?php if($recuser->role_type==2 ){echo "Employer" ;}else{echo "Candidate";}?></td>
												<td class="stat-cell">
													<?php
														if($recuser->status){
															echo '<span class="badge bg-success">Active</span>';
														}else{
															echo '<span class="badge bg-danger">Inactive</span>';
														}
													?>
												</td>
											</tr>
									   </tbody>
								   @endforeach
							</table>
				        </div><!--//table-responsive-->
			        </div><!--//app-card-body-->
		        </div><!--//app-card-->
	        </div><!--//col-->    
		</div><!--//container-fluid-->
		@endif
    </div><!--//app-content-->
</div> 
<script text="text/javascript">
      $(document).ready(function(){
       // toastr.success('XYZ');
    });
</script>
@stop
