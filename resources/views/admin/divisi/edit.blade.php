@extends('layouts.admin')
@section('title')
    <title>Edit Divisi</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Divisi</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif


                    <form class="forms-sample" action="{{ url('divisi/edit/' . $show->id . '') }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group @error('nama_divisi') has-danger @enderror">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi"
                                placeholder="Nama Divisi" value="{{ $show->nama_divisi }}" required>
                            @error('nama_divisi')
                                <label class="error mt-2 text-danger" for="nama_divisi">{{ $message }}</label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                        <button class="btn btn-light" onclick="history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
