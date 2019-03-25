<aside>
	<div class="aside-body">
		<form method="post" action="{{ route('subscribe') }}" class="newsletter">
			@csrf
			<div class="icon">
				<i class="ion-ios-email-outline"></i>
				<h1>Subscribe to Newsletter</h1>
			</div>
		
			@include('pages.frontend.includes.aside_errors')
        
			<div class="input-group">
				<input class="form-control email" name="email" type="email" placeholder="Enter Your Email">
				<div class="input-group-btn">
					<button class="btn btn-primary" type="submit"><i class="ion-paper-airplane"></i></button>
				</div>
			</div>
			<p>By subscribing you will receive new articles in your email.</p>
		</form>
	</div>
</aside>