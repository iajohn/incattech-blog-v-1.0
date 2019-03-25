@extends('layouts.frontend')

@section('meta')
    @include('meta::manager', [
        'robots'        => 'index',
        'title'         =>  $title,
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
    
    @include('pages.frontend.home')
    
    
    <!-- AD SECTION -->
    <!-- <div class="visible-lg visible-md">
        <img class="center-block" src="{{ asset('frontend-theme/img/ad-3.jpg') }}" alt="">
    </div> -->
    <!-- /AD SECTION -->
  
    <!-- @include('partials.frontend.home.editorspick') -->

@endsection

@section('scripts')

    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('subscribed'))
            
            toastr.success("{{ Session::get('subscribed') }}")
        
        @endif
    </script>
@stop