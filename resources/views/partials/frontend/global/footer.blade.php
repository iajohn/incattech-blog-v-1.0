<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="block">
					<h1 class="block-title">Company Info</h1>
					<div class="block-body">
						<figure class="foot-logo">
							<img src="{{ asset('themes/system-theme/img/logo.png') }}" class="img-responsive" alt="Incattech Logo">
						</figure>
						<p class="brand-description">
							{!! str_limit($settings->about_us) !!}
						</p>
						<a href="{{ route('about') }}" class="btn btn-magz white" target="_blank">
							About Us <i class="ion-ios-arrow-thin-right"></i>
						</a>
					</div>
				</div>

				<div class="line"></div>

				<div class="block">
					<div class="block-body no-margin">
						<ul class="footer-nav-horizontal">
							<li><a href="{{ route('index') }}">Home</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
							<li><a href="{{ route('about') }}">About</a></li>
							<li><a href="{{ route('policy') }}">Policy</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="block">
					<h1 class="block-title">Follow Us</h1>
					<div class="block-body">
						<p>Follow us and stay in touch to get the latest news</p>
						<ul class="social trp">
							<li>
								<a href="{{ $settings->facebook }}" class="facebook" target="_blank">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-facebook"></i>
								</a>
							</li>
							<li>
								<a href="{{ $settings->twitter }}" class="twitter" target="_blank">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-twitter-outline"></i>
								</a>
							</li>
							<li>
								<a href="{{ $settings->youtube }}" class="youtube" target="_blank">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-youtube-outline"></i>
								</a>
							</li>
							<li>
								<a href="{{ $settings->instagram }}" class="instagram" target="_blank">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-instagram-outline"></i>
								</a>
							</li>
							<li>
								<a href="{{ $settings->whatsapp }}" class="whatsapp" target="_blank">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-whatsapp-outline"></i>
								</a>
							</li>
							<!-- <li>
								<a href="#" class="googleplus">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-googleplus"></i>
								</a>
							</li>
							<li>
								<a href="#" class="tumblr">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-tumblr"></i>
								</a>
							</li>
							<li>
								<a href="#" class="dribbble">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-dribbble"></i>
								</a>
							</li>
							<li>
								<a href="#" class="linkedin">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="#" class="skype">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-skype"></i>
								</a>
							</li>
							<li>
								<a href="#" class="rss">
									<svg><rect width="0" height="0"/></svg>
									<i class="ion-social-rss"></i>
								</a>
							</li> -->
						</ul>
					</div>
				</div>
				
				<div class="line">
					<div>Or</div>
				</div>
				
				<div class="block">
					<h1 class="block-title">Subscribe To Newsletter</h1>
					<div class="block-body">
						<p>By subscribing you will receive new articles in your email.</p>
						<form method="post" action="{{ route('subscribe') }}" class="newsletter">
							@csrf
							<div class="input-group">
								<div class="input-group-addon">
									<i class="ion-ios-email-outline"></i>
								</div>
								<input name="email" type="email" class="form-control email" placeholder="Enter Your mail">
							</div>
							<button class="btn btn-primary btn-block white" type="submit">Subscribe</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<!-- <div class="block">
					<h1 class="block-title">Hepful Links</h1>
					<div class="block-body">
						<ul class="vertical-menu">
							<li><a href="#">HTML5</a></li>
							<li><a href="#">CSS3</a></li>
							<li><a href="#">Bootstrap 3</a></li>
							<li><a href="#">Web Design</a></li>
							<li><a href="#">Creative Mind</a></li>
							<li><a href="#">Standing On The Train</a></li>
							<li><a href="#">at 6.00PM</a></li>
						</ul>
					</div>
				</div>
				<div class="line"></div> -->
				<div class="block">
					<h1 class="block-title">All Tags 
						<!-- <div class="right"><a href="#">See All <i class="ion-ios-arrow-thin-right"></i></a></div> -->
					</h1>
					<div class="block-body">
						<ul class="tags">
							@foreach($tags as $tag)
                                <li><a href="{{ route('tag.single', [ 'slug' => $tag->slug ]) }}">{{ $tag->tag }}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>				
			</div>

			<div class="col-md-3 col-xs-12 col-sm-6">
				<div class="block">
					<h1 class="block-title">Recent Tweets</h1>
					<div class="block-body">
                        <!-- <div class="tweet-body"> -->
                            <p>
                                <a class="twitter-timeline " href="https://twitter.com/incattech"
                                   data-width="360" data-height="360" data-chrome="scrollbar"
                                   data-theme="dark" data-link-color="#E95F28">
                                </a>
                                <script async type="text/javascript"
                                    src="//plartform.twitter.com/widgets.js" charset="utf-8">
                                </script>
                            </p>
                        <!-- </div> -->
					</div>
				</div>			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="copyright">
					COPYRIGHT &copy; {{ $settings->site_name }} 2019. ALL RIGHT RESERVED.
					<div>
						Template made with <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger,</a> Design by {{ $settings->site_name }}.
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>