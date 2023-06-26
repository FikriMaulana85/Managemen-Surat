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

                        <div class="form-group @error('tanggal_disposisi') has-danger @enderror">
                            <label for="tanggal_disposisi">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_disposisi" name="tanggal_disposisi"
                                placeholder="Tanggal Surat" required>
                            @error('tanggal_disposisi')
                                <label class="error mt-2 text-danger" for="tanggal_disposisi">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_suratmasuk') has-danger @enderror ">
                            <label>Surat Masuk</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="id_suratmasuk" required>"
                                <option selected="true" disabled="disabled" value="" readonly="true">Pilih Surat Masuk
                                </option>
                                @foreach ($surat_masuk as $surat)
                                    <option value="{{ $surat->id }}">{{ $surat->nomor_surat_masuk }}</option>
                                @endforeach

                            </select>
                            @error('id_suratmasuk')
                                <label class="error mt-2 text-danger" for="id_suratmasuk">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('catatan_disposisi') has-danger @enderror">
                            <label for="catatan_disposisi">Catatan</label>
                            <textarea class="form-control" id="catatan_disposisi" name="catatan_disposisi" placeholder="Ringkasan" cols="3"
                                rows="4" required></textarea>
                            @error('catatan_disposisi')
                                <label class="error mt-2 text-danger" for="catatan_disposisi">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('status_disposisi') has-danger @enderror ">
                            <label>Status Disposisi</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="status_disposisi" required>"
                                <option selected="true" disabled="disabled" value="" readonly="true">Pilih Status
                                </option>
                                <option value="Diterima">Diterima</option>
                                <option value="Belum Diterima">Belum Diterima</option>
                                <option value="Di Tolak">Di Tolak</option>

                            </select>
                            @error('status_disposisi')
                                <label class="error mt-2 text-danger" for="status_disposisi">{{ $message }}</label>
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
