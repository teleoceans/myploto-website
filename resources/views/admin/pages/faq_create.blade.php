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
                <div class="card-header">Add New FAQs</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.faq.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label>Question:</label>
                        <input class="form-control" name="question" placeholder="Enter the FAQ question..." required>

                        <br>
                        <label>Answer:</label>
                        <textarea class="form-control" name="answer" placeholder="Enter the FAQ answer..." required></textarea>

                        <br>
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
