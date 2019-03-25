<header class="primary">
	<div class="firstbar">
		<div class="container">

			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="brand">
						<a href="{{ route('index') }}">
							<img src="{{ asset('themes/system-theme/img/logo.png') }}" alt="Incattech Logo">
						</a>
					</div>						
				</div>
				
				<div class="col-md-6 col-sm-12">
					<form method="GET" action="/results" class="search" autocomplete="off">
						<div class="form-group">
							<div class="input-group">
								<input type="text" name="search" class="form-control" placeholder="Type something here">									
								<div class="input-group-btn">
									<button type="submit" class="btn btn-primary"><i class="ion-search"></i></button>
								</div>
							</div>
						</div>
						
						<!-- <div class="help-block">
							<div>Popular:</div>
							<ul>
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">Bootstrap 3</a></li>
								<li><a href="#">jQuery</a></li>
								<li><a href="#">AnguarJS</a></li>
							</ul>
						</div> -->
					</form>								
				</div>
				
				<div class="col-md-3 col-sm-12 text-right">
					<ul class="nav-icons">
						@if (Route::has('login'))
		                    @auth
		                        <li>
		                        	<a href="{{ route('home') }}" target="_blank">
		                        		<i class="ion-home"></i><div>Admin Area</div>
		                        	</a>
		                        </li>
		                    @else
		                        <li>
		                        	<a href="{{ route('login') }}" target="_blank">
		                        		<i class="ion-person"></i><div>Login</div>
		                        	</a>
		                        </li>
		                        @if (Route::has('register'))
		                            <li>
		                            	<a href="{{ route('register') }}" target="_blank">
		                            		<i class="ion-person-add"></i><div>Register</div>
		                            	</a>
		                            </li>
		                        @endif
		                    @endauth
		                
		                @endif

						<!-- <li><a href="register.html"><i class="ion-person-add"></i><div>Register</div></a></li>
						<li><a href="login.html"><i class="ion-person"></i><div>Login</div></a></li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Start nav -->
	<nav class="menu">
		<div class="container">
			<div class="brand">
				<a href="{{ route('index') }}">
					<img src="{{ asset('themes/system-theme/img/logo.png') }}" alt="Incattech Logo">
				</a>
			</div>

			<div class="mobile-toggle">
				<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
			</div>

			<div class="mobile-toggle">
				<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
			</div>

			<div id="menu-list">
				<ul class="nav-list">
					<li class="for-tablet nav-title"><a>Menu</a></li>
					@if (Route::has('login'))
	                    @auth
	                        <li class="for-tablet"><a href="{{ route('home') }}" target="_blank"><i class="ion-home"></i><div>Admin Area</div></a></li>
	                    @else
	                        <li class="for-tablet">
	                        	<a href="{{ route('login') }}" target="_blank">
	                        		<i class="ion-person"></i><div>Login</div>
	                        	</a>
	                        </li>
	                        @if (Route::has('register'))
	                            <li class="for-tablet">
	                            	<a href="{{ route('register') }}" target="_blank">
	                            		<i class="ion-person-add"></i><div>Register</div>
	                            	</a>
	                            </li>
	                        @endif
	                    @endauth
	                
	                @endif

					<li class="divider"></li>

					<!-- <li><a href="{{ url('/') }}">Home</a></li> -->

					<li class="dropdown magz-dropdown magz-dropdown-megamenu">
						<a href="#"> {{ __('Topics')}} <i class="ion-ios-arrow-down"></i></a>
						<div class="dropdown-menu megamenu">
							<div class="megamenu-inner">
								<div class="row">
									<div class="col-md-3">
										<ul class="vertical-menu">
											@foreach($categories as $cat)
							                    <li class="">
							                        <a href="{{ route('category.single', [ 'slug' => $cat->slug ]) }}">
							                        	<i class="ion-ios-circle-outline"></i> {{ $cat->name }}
							                        </a>
							                    </li>
							                @endforeach
										</ul>
									</div>
									
									<div class="col-md-9">
										<div class="best-of-the-week" style="margin-top: -4px !important;">
											<h1><div class="text">Editor's Pick</div>
												<div class="carousel-nav" id="best-of-the-week-nav">
													<div class="prev">
														<i class="ion-ios-arrow-left"></i>
													</div>
													<div class="next">
														<i class="ion-ios-arrow-right"></i>
													</div>
												</div>
											</h1>

											<div class="owl-carousel owl-theme carousel-1">
												@if($editors_pick->count() > 0)
													@foreach($editors_pick as $P)
										                <article class="article">
															<div class="inner">
																<figure>
																	<div class="article-img"> 
																		<a href="{{ route('post.single', [ 'slug' => $P->slug ]) }}">
													                    	<img src="{{ $P->featured }}" alt="{{ $P->title }}">
																		</a>
																	</div>
																</figure>
																<div class="padding">
																	<div class="detail">
																		<div class="time">{{ $P->created_at->toFormattedDateString() }}</div>
																		<div class="category">
																			<a href="{{ route('category.single', [ 'slug' => $P->category->slug ]) }}">
											                                    {{ $P->category->name }}
											                                </a>
																		</div>
																	</div>
																	<h2><a href="{{ route('post.single', [ 'slug' => $P->slug ]) }}">{{ $P->title }}</a></h2>
																</div>
															</div>
														</article>
													@endforeach
											</div>

												@else
													<div class="row">
										                <div class="col-md-12">
										                    <div class="alert alert-info text-center">
										                        <p>{{ __('There are no posts picked by our editors at the moment check later!') }}</p>
										                    </div>                   
									                	</div>
									                </div>
									        	@endif
										</div>
									</div>
								</div>								
							</div>
						</div>
					</li>

					<li class="dropdown magz-dropdown magz-dropdown-megamenu">
						<a href="#"> {{ __('Business')}} <i class="ion-ios-arrow-down"></i></a>
						<div class="dropdown-menu megamenu">
							<div class="megamenu-inner">
								<div class="row">
									<div class="col-md-3">
										<ul class="vertical-menu" role="tablist">
											<li class="active">
												<a href="#all-business" aria-controls="all-business" role="tab" data-toggle="tab"> 
													<i class="ion-ios-circle-outline"></i> {{ __('Top Posts')}} 
												</a>
											</li>
											
											<li>
												<a href="{{ route('category.single', [ 'slug' => $_3->slug ]) }}"> 
													<i class="ion-ios-circle-outline"></i> {{ $_3->name }} 
												</a>
											</li>
											
											<li>
												<a href="{{ route('category.single', [ 'slug' => $_4->slug ]) }}"> 
													<i class="ion-ios-circle-outline"></i> {{ $_4->name }} 
												</a>
											</li>
											
											<li>
												<a href="{{ route('category.single', [ 'slug' => $_5->slug ]) }}" > 
													<i class="ion-ios-circle-outline"></i> {{ $_5->name }} 
												</a>
											</li>
										</ul>
									</div>
									
									<div class="col-md-9">
										<div class="tab-content">
											<div class="tab-pane active" id="all-business">
												<div class="row">
													<div class="col-md-12" style="margin-top: 10px !important;">
														<h2 class="megamenu-title">Top Posts</h2> 
														<!-- <a class=" btn btn-pimary pull-right"> view all</a> -->
													</div>
												</div>
													
												<div class="row">
													@if($randomPosts->count() > 0)
														@foreach($randomPosts as $Posts)
															<article class="article col-md-4 mini">
																<div class="inner">
																	<figure>
																		<div class="article-img">
																			<a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">
																				<img src="{{ $Posts->featured }}" alt="{{ $Posts->title }}">
																			</a>
																		</div>
																	</figure>
																	<div class="padding">
																		<div class="detail">
																			<div class="time"> {{ $Posts->created_at->toFormattedDateString() }} </div>
																			<div class="category">
																				<a href="{{ route('category.single', [ 'slug' => $Posts->category->slug ]) }}">
														                            {{ $Posts->category->name }}
														                        </a>
																			</div>
																		</div>
																		<h2><a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">{{ $Posts->title }}</a></h2>
																	</div>
																</div>
															</article>
														@endforeach
														
														@else
															<div class="row">
												                <div class="col-md-12">
												                    <div class="alert alert-info text-center">
												                        <p>{{ __('There are no top posts at the moment check later!') }}</p>
												                    </div>                   
											                	</div>
											                </div>
										        	@endif
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>
						</div>
					</li>

					<li class="dropdown magz-dropdown magz-dropdown-megamenu">
						<a href="#"> {{ __('Interviews')}} <i class="ion-ios-arrow-down"></i></a>
						<div class="dropdown-menu megamenu">
							<div class="megamenu-inner">
								<div class="row">
									<div class="col-md-3">
										<ul class="vertical-menu" role="tablist">
											<li class="active">
												<a href="#all-interviews" aria-controls="all-interviews" role="tab" data-toggle="tab">
													<i class="ion-ios-circle-outline"></i> {{ __('Top Posts')}} 
												</a>
											</li>
											
											<li>
												<a href="{{ route('category.single', [ 'slug' => $_6->slug ]) }}"> 
													<i class="ion-ios-circle-outline"></i> {{ $_6->name }} 
												</a>
											</li>
											
											<li>
												<a href="{{ route('category.single', [ 'slug' => $_7->slug ]) }}"> 
													<i class="ion-ios-circle-outline"></i> {{ $_7->name }} 
												</a>
											</li>
										</ul>
									</div>
									
									<div class="col-md-9">
										<div class="tab-content">
											<div class="tab-pane active" id="all-interviews">
												<div class="row">
													<div class="col-md-12" style="margin-top: 10px !important;">
														<h2 class="megamenu-title">Top Posts</h2> 
														<!-- <h2 class="megamenu-title">Featured Posts</h2>  -->
														<!-- <a class=" btn btn-pimary pull-right"> view all</a> -->
													</div>
												</div>
													
												<div class="row">
													@foreach($randomPosts as $Posts)
														<article class="article col-md-4 mini">
															<div class="inner">
																<figure>
																	<div class="article-img">
																		<a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">
																			<img src="{{ $Posts->featured }}" alt="{{ $Posts->title }}">
																		</a>
																	</div>
																</figure>
																<div class="padding">
																	<div class="detail">
																		<div class="time"> {{ $Posts->created_at->toFormattedDateString() }} </div>
																		<div class="category">
																			<a href="{{ route('category.single', [ 'slug' => $Posts->category->slug ]) }}">
													                            {{ $Posts->category->name }}
													                        </a>
																		</div>
																	</div>
																	<h2><a href="{{ route('post.single', [ 'slug' => $Posts->slug ]) }}">{{ $Posts->title }}</a></h2>
																</div>
															</div>
														</article>
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>
						</div>
					</li>					

					<li class="dropdown magz-dropdown">
						<a href="#"> {{ __('more')}} <i class="ion-ios-arrow-down"></i></a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('category.single', [ 'slug' => $_8->slug ]) }}" > 
									<i class="icon ion-ios-photos"></i> {{ $_8->name }} 
								</a>
							</li>
							<!-- <li><a href="#"><i class="icon ion-ios-flag"></i> {{ __('Ads Placement')}} </a></li> -->
							<!-- <li><a href="#"><i class="icon ion-settings"></i> {{ __('Careers')}} </a></li> -->
							<!-- <li><a href="#"><i class="icon ion-ios-cart"></i> {{ __('Market Place')}} </a></li> -->
							
							<li class="divider"></li>

							<li><a href="{{ route('about') }}"><i class="icon ion-person"></i> {{ __('About Us')}} </a></li>
							<li><a href="{{ route('contact') }}"><i class="icon ion-ios-telephone"></i> {{ __('Contact Us')}} </a></li>
							<!-- <li><a href=""><i class="icon ion-key"></i> {{ __('Privacy Policy')}} </a></li>							 -->
						</ul>
					</li>

					<!-- <li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#">  <i class="ion-ios-arrow-right"></i></a>
						<div class="dropdown-menu megamenu">
							<div class="megamenu-inner">
								<div class="row">
									<div class="col-md-3">
										<h2 class="megamenu-title">Column 1</h2>
										<ul class="vertical-menu">
											<li><a href="#">Example 1</a></li>
											<li><a href="#">Example 2</a></li>
											<li><a href="#">Example 3</a></li>
											<li><a href="#">Example 4</a></li>
											<li><a href="#">Example 5</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<h2 class="megamenu-title">Column 2</h2>
										<ul class="vertical-menu">
											<li><a href="#">Example 6</a></li>
											<li><a href="#">Example 7</a></li>
											<li><a href="#">Example 8</a></li>
											<li><a href="#">Example 9</a></li>
											<li><a href="#">Example 10</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<h2 class="megamenu-title">Column 3</h2>
										<ul class="vertical-menu">
											<li><a href="#">Example 11</a></li>
											<li><a href="#">Example 12</a></li>
											<li><a href="#">Example 13</a></li>
											<li><a href="#">Example 14</a></li>
											<li><a href="#">Example 15</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<h2 class="megamenu-title">Column 4</h2>
										<ul class="vertical-menu">
											<li><a href="#">Example 16</a></li>
											<li><a href="#">Example 17</a></li>
											<li><a href="#">Example 18</a></li>
											<li><a href="#">Example 19</a></li>
											<li><a href="#">Example 20</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- End nav -->
</header>