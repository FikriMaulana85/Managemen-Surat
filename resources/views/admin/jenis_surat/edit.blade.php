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


                    <form class="forms-sample" action="{{ url('jenis_surat/edit/' . $show->id . '') }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group @error('kode_jenis_surat') has-danger @enderror">
                            <label for="kode_jenis_surat">Kode Jenis Surat</label>
                            <input type="text" class="form-control" id="kode_jenis_surat" name="kode_jenis_surat"
                                placeholder="Kode Jenis Surat"
                                value="{{ old('kode_jenis_surat', $show->kode_jenis_surat) }}" required>
                            @error('kode_jenis_surat')
                                <label class="error mt-2 text-danger" for="kode_jenis_surat">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('jenis_surat') has-danger @enderror">
                            <label for="jenis_surat">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat"
                                placeholder="Jenis Surat" value="{{ $show->jenis_surat }}" required>
                            @error('jenis_surat')
                                <label class="error mt-2 text-danger" for="jenis_surat">{{ $message }}</label>
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
