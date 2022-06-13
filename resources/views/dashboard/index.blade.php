@extends('dashboard.layouts.main')

@section('container')
        <div aria-label="breadcrumb" class="container py-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class=" text-black">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <!-- Tambahin disini.... -->
        <div class="container bg-light pb-5">
            <h3 class="">Welcome, Admin.</h3>

            <div class="row mt-3 ms-0">
                <div class="col-md-3 bg-success d-flex flex-column rounded me-5 text-white">
                    <h2 class="">10</h2>
                    <p class="pb-0 mb-0">BTS</p>
                    <a href="/bts" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white">Show more <i class="bi bi-chevron-right "></i></a>
                </div>
                <div class="col-md-3 bg-primary d-flex flex-column rounded me-5 text-white">
                    <h2 class="">10</h2>
                    <p class="pb-0 mb-0">Operator</p>
                    <a href="/operator" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white">Show more <i class="bi bi-chevron-right "></i></a>
                </div>
                <div class="col-md-3 bg-warning d-flex flex-column rounded me-5 text-white">
                    <h2 class="">{{ $jumlah_monitoring }}</h2>
                    <p class="pb-0 mb-0">Monitoring</p>
                    <a href="/monitoring" class="btn  my-2 text-decoration-none text-white d-flex justify-content-between border-top border-white">Show more <i class="bi bi-chevron-right "></i></a>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-md-4 me-3">
                    <div class="card">
                        <div class="card-header bg-info fw-bold">
                            Recent Activity
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($activities as $row)
                                <li class="list-group-item">
                                    <p class="text-black-50">{{ $row->at }}</p>
                                    <p class="mb-0"><i class="bi 
                                        @if ($row->action == 'add')
                                            bi-plus-circle
                                        @elseif ($row->action == 'edit')
                                            bi-pencil-square
                                        @elseif ($row->action == 'delete')
                                            bi-trash
                                        @endif 
                                    "></i> <a href="#" class="fw-bold text-decoration-none text-black" id="profileLink">{{ $row->user->name }}</a> {{ $row->action }} {{  $row->object }}</p>
                                    <!-- hover card -->
                                    {{-- <div class="card collapse position-absolute" style="width: 14rem;" id="profileHover">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc3j_jlYp_6GSfnlumRrqQEfP2vdo_BF8h8A&usqp=CAU" class="card-img-top" alt="Profile Picture" style="width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $row->user->name }}</h5>
                                            <p class="card-text">{{ $row->user->email }}</p>
                                            <a href="#" class="btn btn-primary">Go to profile <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </li> --}}
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info fw-bold">
                            Last Login
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="text-black-50">2022-04-04 16:23:24</p>
                                <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Admin</span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-black-50">2022-04-04 16:23:24</p>
                                <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Gina Vanesa Uyainah S.Psi</span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-black-50">2022-04-04 16:23:24</p>
                                <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Admin</span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-black-50">2022-04-04 16:23:24</p>
                                <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Kania Andriani</span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-black-50">2022-04-04 16:23:24</p>
                                <p class="mb-0"><i class="bi bi-person-circle"></i> <span class="fw-bold">Jaya Situmorang M.Kom.</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection