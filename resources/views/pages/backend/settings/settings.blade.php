@extends('layouts.backend')

@section('title','Manage Site')

@section('content')

    @include('pages.backend.incl.errors')
    
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                
                <li class="breadcrumb-item active">Settings</li>
            </ul>
        </div>
    </div>

    <section class="forms">
        <div class="container-fluid">
            <!-- <header></header> -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Manage Site</h4>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name">Site Name</label>
                                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Contact Address</label>
                                    <input type="text" name="contact_address" value="{{ $settings->contact_address }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Contact Email</label>
                                    <input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Contact Phone</label>
                                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Facebook Address </label>
                                    <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Instagram Address </label>
                                    <input type="text" name="instagram" value="{{ $settings->instagram }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Whatsapp Address </label>
                                    <input type="text" name="whatsapp" value="{{ $settings->whatsapp }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Twitter Address </label>
                                    <input type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email"> YouTube Address </label>
                                    <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="about">About Us</label>
                                    <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{ $settings->about_us }}</textarea>
                                </div>

                                
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Update</button>
                                        or <a href="{{ route('home') }}" class="">cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#about').summernote();
        });
    </script>
@stop