@extends('layouts.web')
@section('title', 'Login')

@section('scripts')
<script>
    localStorage.setItem("name", "{{ $user->name }}");
    localStorage.setItem("email", "{{ $user->email }}");
    localStorage.setItem("phone_number", "{{ $user->phone_number }}");
    localStorage.setItem("city", "{{ $user->city }}");
    localStorage.setItem("address", "{{ $user->address }}");
    window.location.href = "{{ route('pages.services') }}";
</script>
@endsection
