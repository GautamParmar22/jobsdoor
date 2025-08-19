<div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
	<div id="sidepanel-drop" class="sidepanel-drop"></div>
	<div class="sidepanel-inner d-flex flex-column">
		<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		<div class="app-branding">
			<a class="app-logo" href="{{url('dashboard-page')}}"><img class="logo-icon me-2"
					style="height: auto; width: auto;" src="{{URL::asset('assets/admin/images/JobsDoor_Logo.svg')}}"
					alt="logo"></a>

		</div><!--//app-branding-->
		<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
			<ul class="app-menu list-unstyled accordion" id="menu-accordion">
				<li class="nav-item">

					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link" href="{{url('dashboard-page')}}">
						<span class="nav-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
								fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
								<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
							</svg>
						</span>
						<span class="nav-link-text">Dashboard</span>
					</a><!--//nav-link-->
				</li><!--//nav-item-->
				<?php $user = Auth::user()->role_type == 1 ?>
				@if($user == 1)
					<li class="nav-item has-submenu">
						<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2"
							aria-expanded="false" aria-controls="submenu-2">
							<span class="nav-icon">

								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
								</svg>
							</span>
							<span class="nav-link-text">Users</span>
							<span class="submenu-arrow">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
								</svg>
							</span>
						</a>
						<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
							<ul class="submenu-list list-unstyled">
								<li class="submenu-item"><a class="submenu-link" href="{{url('all-users-page')}}">All</a>
								</li>
								<li class="submenu-item"><a class="submenu-link"
										href="{{url('employer-data-page')}}">Employer</a></li>
								<li class="submenu-item"><a class="submenu-link"
										href="{{url('candidate-data-page')}}">Candidate</a></li>
								<!--<li class="submenu-item"><a class="submenu-link" href="{{url('login-page')}}">Login</a></li>
										<li class="submenu-item"><a class="submenu-link" href="{{url('resetpass-page')}}">Reset password</a></li>-->
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link" href="{{url('all-job-posts')}}">
							<span class="nav-icon">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
									<path fill-rule="evenodd"
										d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
									<circle cx="3.5" cy="5.5" r=".5" />
									<circle cx="3.5" cy="8" r=".5" />
									<circle cx="3.5" cy="10.5" r=".5" />
								</svg>
							</span>
							<span class="nav-link-text">Job Posts Management</span>
						</a><!--//nav-link-->
					</li><!--//nav-item-->
				@else
					<li class="nav-item has-submenu">
						<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2"
							aria-expanded="false" aria-controls="submenu-2">
							<span class="nav-icon">

								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
								</svg>
							</span>
							<span class="nav-link-text">Users</span>
							<span class="submenu-arrow">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
								</svg>
							</span>
						</a>
						<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
							<ul class="submenu-list list-unstyled">
								<li class="submenu-item"><a class="submenu-link"
										href="{{url('employer-data-self')}}">Employer</a></li>
								<li class="submenu-item"><a class="submenu-link"
										href="{{url('candidate-data-page-emp')}}">Candidate</a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link" href="{{url('add-job-post')}}">
							<span class="nav-icon">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-briefcase-fill"
									fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M6.5 0a.5.5 0 0 0-.5.5V1H3a2 2 0 0 0-2 2v11.5A1.5 1.5 0 0 0 2.5 16h11a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H10V.5a.5.5 0 0 0-.5-.5h-3zM10 5v2H6V5h4z" />
								</svg>
							</span>
							<span class="nav-link-text">Manage Job Posts</span>
						</a><!--//nav-link-->
					</li><!--//nav-item-->
				@endif

				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link" href="{{url('account-page')}}">
						<span class="nav-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
								fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
								<path fill-rule="evenodd"
									d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
								<circle cx="3.5" cy="5.5" r=".5" />
								<circle cx="3.5" cy="8" r=".5" />
								<circle cx="3.5" cy="10.5" r=".5" />
							</svg>
						</span>
						<span class="nav-link-text">Manage Account</span>
					</a><!--//nav-link-->
				</li><!--//nav-item-->
			</ul>
		</nav><!--//app-nav-->
		<div class="app-sidepanel-footer">
			<nav class="app-nav app-nav-footer">
				<ul class="app-menu footer-menu list-unstyled">
				</ul><!--//footer-menu-->
			</nav>
		</div><!--//app-sidepanel-footer-->
	</div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->