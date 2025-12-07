@extends('layouts.app')
@section('stylesheets')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.partials._sidemenu')
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Add New Service</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label>Name:</label>
                        <input class="form-control" name="name" placeholder="Enter the service name for mobile apps..." required>

                        <br>
                        <label>Description:</label>
                        <textarea class="form-control" name="description" 
                        placeholder="Enter the service description for the website..." required></textarea>

                        <br>

                        <label>Mobile Apps Image Icon:</label>
                        <input type="file" class="form-control" name="image" required>

                        <br>

                        <label>Website Image:</label>
                        <input type="file" class="form-control" name="web_image" required>

                        <br>

                        <label>Service Price: (AUD)</label>
                        <input type="number" class="form-control" name="price" required>

                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> 
                        Add Service To Website And Mobile Apps</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
