@extends('dashboard.layouts.main')

@section('container')
    <div aria-label="breadcrumb" class="container py-2 ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="/admin" class=" text-black">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>

    <div class="container">
        <h3 class="fw-bold mb-3">Profile</h3>
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('img/profile-pic.png') }}" alt="Profile picture" class="rounded-circle w-75">
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center">
                <h5 class="fw-bold">{{ auth()->user()->name }}</h5>
                <p>{{ auth()->user()->role }}</p>
            </div>
        </div>
        <form action="/profile/edit" class="form-group col-md-9 my-3" method="POST">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control mb-2" value="{{ auth()->user()->name }}" name="name">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control mb-2" value="{{ auth()->user()->email }}" name="email">
            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
    </div>
@endsection