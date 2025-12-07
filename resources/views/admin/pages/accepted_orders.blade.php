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
                <div class="card-header"><span class="badge badge-dark">{{ $counter }}</span> - Accepted Orders</div>

                <div class="card-body">
                    @include('admin.partials._orders')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
