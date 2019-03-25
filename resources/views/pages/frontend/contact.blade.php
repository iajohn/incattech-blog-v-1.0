@extends('layouts.frontend')

@section('meta')
    @include('meta::manager', [
        'robots'        => 'index',
        'title'         => $title,
        'description'   => 'Welcome to Incattech.com, the media arm of Incattech. Incattech is a Fashion Tech & Fashion Media Company based in Lagos Nigeria.',
        'image'         => 'https://incattech.com',
        'author'        => 'Incattech.com',
        'keywords'      => $title . ', ' . 'incattech, media, fashion, technology, tech, clothing, AR, VR, AI, retail, sustainability',
        'geo_region'    => 'Lagos Nigeria',
        'geo_position'  => '4.870467,6.993388',
    ])
@stop 

@section('styles')
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop

@section('content')
	<section class="page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
		          <ol class="breadcrumb">
		          	<li><a href="{{ route('index') }}">Home</a></li>
		            <li class="active">{{ $title }}</li>
		          </ol>
					<h1 class="page-title">{{ $title }}</h1>
					<p class="page-subtitle">You can connect with us here</p>
					<div class="line thin"></div>
					<div class="page-description">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<h3>Contact</h3>
								<p>
									
								</p>	
								<p>
									<i class="icon ion-ios-telephone"></i> | <span class="bold">{{ $settings->contact_number }}</span> <br>
									<i class="ion-ios-email-outline"></i> | <span class="bold">{{ $settings->contact_email }}</span>
									<br>
									<br>
									{{ $settings->contact_address }}
								</p>
							</div>
							<div class="col-md-6 col-sm-6">
								<form method="post" data-toogle="validator" class="row contact" id="contact-form">
									@csrf   <!-- {{ method_field('POST') }} -->
									<div class="col-md-6">
										<div class="form-group">
											<label>Name <span class="required"></span></label>
											<input type="text" class="form-control" name="name" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email <span class="required"></span></label>
											<input type="text" class="form-control" name="email" required="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Subject</label>
											<input type="text" class="form-control" name="subject">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Your message <span class="required"></span></label>
											<textarea class="form-control" name="message" required=""></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn btn-primary">Send Message</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="maps">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7927.32512614206!2d106.75366058323345!3d-6.
		564206896052583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1377e9bdc02eea68!2zNsKwMzMnNDkuOCJTIDEw
		NsKwNDUnMjAuNiJF!5e0!3m2!1sen!2sid!4v1495165466482" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
@stop

@section('scripts')
    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('success'))
            
            toastr.success("{{ Session::get('success') }}")
        
        @endif
    </script>
@stop