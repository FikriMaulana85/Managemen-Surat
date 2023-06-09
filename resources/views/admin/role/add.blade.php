@extends('layouts.admin')
@section('title')
    <title>Tambah Role</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Role</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('role/add') }}" method="POST">
                        @csrf

                        <div class="form-group @error('nama_role') has-danger @enderror">
                            <label for="nama_role">Nama Role</label>
                            <input type="text" class="form-control" id="nama_role" name="nama_role"
                                placeholder="Nama Role" required>
                            @error('nama_role')
                                <label class="error mt-2 text-danger" for="nama_role">{{ $message }}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light" onclick="history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
