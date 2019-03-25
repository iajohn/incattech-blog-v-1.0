<section class="home">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				
				<!-- <div class="headline">
					<div class="nav" id="headline-nav">
						<a class="left carousel-control" role="button" data-slide="prev">
							<span class="ion-ios-arrow-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" role="button" data-slide="next">
							<span class="ion-ios-arrow-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="owl-carousel owl-theme" id="headline">							
						<div class="item">
							<a href="#"><div class="badge">Tip!</div> Vestibulum ante ipsum primis in faucibus orci</a>
						</div>
						<div class="item">
							<a href="#">Ut rutrum sodales mauris ut suscipit</a>
						</div>
					</div>
				</div> -->
				
				@include('partials.frontend.home.introfeatured')

				@include('partials.frontend.home.latest')
				
				<div class="banner">
					<a href="#">
						<img src="{{ asset('themes/frontend-theme/images/ads.png') }}" alt="Sample Article">
					</a>
				</div>

				@include('partials.frontend.home.categories')

				<!-- <div class="line top">
					<div>Just Another News</div>
				</div>
				
				<div class="row">
					<article class="col-md-12 article-list">
						<div class="inner">
							<figure>
								<a href="single.html">
									<img src="images/news/img11.jpg" alt="Sample Article">
								</a>
							</figure>
							<div class="details">
								<div class="detail">
									<div class="category">
										<a href="#">Film</a>
									</div>
									<div class="time">December 19, 2016</div>
								</div>
								<h1><a href="single.html">Donec consequat arcu at ultrices sodales quam erat aliquet diam</a></h1>
								<p>
								Donec consequat, arcu at ultrices sodales, quam erat aliquet diam, sit amet interdum libero nunc accumsan nisi.
								</p>
								<footer>
									<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
									<a class="btn btn-primary more" href="single.html">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
								</footer>
							</div>
						</div>
					</article>
					<article class="col-md-12 article-list">
						<div class="inner">
							<div class="badge">
								Sponsored
							</div>
							<figure>
								<a href="single.html">
									<img src="images/news/img02.jpg" alt="Sample Article">
								</a>
							</figure>
							<div class="details">
								<div class="detail">
									<div class="category">
										<a href="#">Travel</a>
									</div>
									<div class="time">December 18, 2016</div>
								</div>
								<h1><a href="single.html">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
								<p>
									Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat sollicitudin ut est. In fringilla dui.
								</p>
								<footer>
									<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>4209</div></a>
									<a class="btn btn-primary more" href="single.html">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
								</footer>
							</div>
						</div>
					</article>
					<article class="col-md-12 article-list">
						<div class="inner">
							<figure>
								<a href="single.html">
									<img src="images/news/img03.jpg" alt="Sample Article">
								</a>
							</figure>
							<div class="details">
								<div class="detail">
									<div class="category">
									<a href="#">Travel</a>
									</div>
									<div class="time">December 16, 2016</div>
								</div>
								<h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum Proin venenatis pellentesque arcu</a></h1>
								<p>
									Nulla facilisis odio quis gravida vestibulum. Proin venenatis pellentesque arcu, ut mattis nulla placerat et.
								</p>
								<footer>
									<a href="#" class="love active"><i class="ion-android-favorite"></i> <div>302</div></a>
									<a class="btn btn-primary more" href="single.html">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
								</footer>
							</div>
						</div>
					</article>
					<article class="col-md-12 article-list">
						<div class="inner">
							<figure>
								<a href="single.html">
									<img src="images/news/img09.jpg" alt="Sample Article">
								</a>
							</figure>
							<div class="details">
								<div class="detail">
									<div class="category">
										<a href="#">Healthy</a>
									</div>
									<div class="time">December 16, 2016</div>
								</div>
								<h1><a href="single.html">Maecenas blandit ultricies lorem id tempor enim pulvinar at</a></h1>
								<p>
									Maecenas blandit ultricies lorem, id tempor enim pulvinar at. Curabitur sit amet tortor eu ipsum lacinia malesuada.
								</p>
								<footer>
									<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>783</div></a>
									<a class="btn btn-primary more" href="single.html">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
								</footer>
							</div>
						</div>
					</article>
				</div> -->
			</div>
			
			@include('partials.frontend.home.sidebar')
		</div>
	</div>
</section>