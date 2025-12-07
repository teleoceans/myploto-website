@if (Session::has('success'))

    <div class="alert alert-success" role="alert" style="margin-top: 40px">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>

@endif

@if (Session::has('error_message'))

    <div class="alert alert-danger" role="alert" style="margin-top: 40px">
        <strong>Error:</strong> {{ Session::get('error_message') }}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert" style="margin-top: 40px">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif