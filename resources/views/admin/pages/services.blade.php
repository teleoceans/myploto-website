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
                <div class="card-header"><span class="badge badge-dark">{{ $counter }}</span> - Services</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-6" style="border: 2px solid #ccc; padding: 60px 10px">
                                <h4>#{{ $service->id }} - {{ $service->name }} - {{ $service->price }} AED</h4>
                                <img src="/services/{{ $service->image }}" style="width: 120px">
                                <img src="/services/{{ $service->web_image }}" style="max-width: 100%">
                                <p>
                                    {{ $service->description }}
                                </p>
                                <a href="{{ route('admin.services.delete', $service->id) }}" class="btn btn-block btn-danger">
                                    <i class="fa fa-trash"></i> Delete Service
                                </a>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-block btn-success">
                                    <i class="fa fa-edit"></i> Edit Service
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
