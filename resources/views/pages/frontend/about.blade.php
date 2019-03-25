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
    <!-- <link href="{{ asset('frontend-theme/css/user_card.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop

@section('content')
	<section class="page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
	      <ol class="breadcrumb">
	      	<li><a href="{{ route('index') }}">Home</a></li>
	        <li class="active">{{ $title }}</li>
	      </ol>
					<h1 class="page-title">About Us</h1>
					<p class="page-subtitle">We will tell you who we are</p>
					<div class="line thin"></div>
					<div class="page-description">
						<p>
							{{ $settings->about_us }}
						</p>
						<div class="question">
							Have a question? <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('subscribed'))
            
            toastr.success("{{ Session::get('subscribed') }}")
        
        @endif
    </script>
@stop