@extends('layouts.admin')
@section('title')
    <title>Dashboard</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Divisi</h6>
                    <h2 class="mb-0">{{ $totaldivisi }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Jenis Surat</h6>
                    <h2 class="mb-0">{{ $totaljenissurat }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-success text-white text-center card-shadow-success">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Surat Masuk</h6>
                    <h2 class="mb-0">{{ $totalsuratmasuk }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                    <h6 class="font-weight-normal">Total Surat Keluar</h6>
                    <h2 class="mb-0">{{ $totalsuratkeluar }}</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
