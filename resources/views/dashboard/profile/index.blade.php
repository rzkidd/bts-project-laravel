@extends('dashboard.layouts.main')

@section('container')
    <div aria-label="breadcrumb" class="container py-2 ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="/admin" class=" text-black">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>

    @if (session()->has('success'))
        <div class="col-md-9 ">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
@endsection