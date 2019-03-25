@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h6 class="">
                {{ $error }}
            </h6>                
        @endforeach
    </div>
    </br>
@endif