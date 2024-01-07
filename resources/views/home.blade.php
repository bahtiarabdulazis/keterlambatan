@extends('layouts.template')

@section('content')
    <div class="container-fluid" style="color:rgb(0, 64, 137)">
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">Dashboard</h2>
                </div>
            </div>
            <div class="row" style="color:rgb(0, 64, 137)">
                <div class="col-lg-6 mb-4">
                    <div class="card h-200 text-dark shadow" style="background-color:#ffffff;">
                        <div class="card-body" style="color:rgb(0, 64, 137)">
                            <h5 class="card-title">Peserta Didik</h5>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-1">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col-md-11">
                                    <p class="card-text">{{ $jmlStudent }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="card h-200 text-dark shadow" style="background-color:#ffffff;">
                        <div class="card-body" style="color:rgb(0, 64, 137)">
                            <h5 class="card-title">Administrator</h5>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-2">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text">{{ $jmlAdmin }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="card h-200 text-dark shadow" style="background-color:#ffffff;">
                        <div class="card-body" style="color:rgb(0, 64, 137)">
                            <h5 class="card-title">Pembimbing Siswa</h5>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-2">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text">{{ $jmlPs }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card h-200 text-dark shadow" style="background-color:#ffffff;">
                        <div class="card-body" style="color:rgb(0, 64, 137)">
                            <h5 class="card-title">Rombel</h5>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-1">
                                    <i class="fa-solid fa-school"></i>
                                </div>
                                <div class="col-md-11">
                                    <p class="card-text">{{ $jmlRombel }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card h-200 text-dark shadow" style="background-color:#ffffff;">
                        <div class="card-body" style="color:rgb(0, 64, 137)">
                            <h5 class="card-title">Rayon</h5>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-1">
                                    <i class="fa-solid fa-school"></i>
                                </div>
                                <div class="col-md-11">
                                    <p class="card-text">{{ $jmlRayon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
