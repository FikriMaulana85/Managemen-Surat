@extends('layouts.admin')
@section('title')
    <title>Tambah Disposisi</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Disposisi</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ url('disposisi/add') }}" method="POST">
                        @csrf

                        <div class="form-group @error('nama_disposisi') has-danger @enderror">
                            <label for="nama_disposisi">Nama Disposisi</label>
                            <input type="text" class="form-control" id="nama_disposisi" name="nama_disposisi"
                                placeholder="Nama Disposisi" required>
                            @error('nama_disposisi')
                                <label class="error mt-2 text-danger" for="nama_disposisi">{{ $message }}</label>
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
