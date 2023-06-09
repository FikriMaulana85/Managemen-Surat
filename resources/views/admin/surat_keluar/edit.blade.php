@extends('layouts.admin')
@section('title')
    <title>Edit Surat Keluar</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Surat Keluar</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif


                    <form class="forms-sample" action="{{ url('surat_keluar/edit/' . $show[0]->id . '') }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group @error('tanggal_surat') has-danger @enderror">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
                                placeholder="Tanggal Surat" value="{{ $show[0]->tanggal_surat }}" required>
                            @error('tanggal_surat')
                                <label class="error mt-2 text-danger" for="tanggal_surat">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_jenis_surat') has-danger @enderror ">
                            <label>Jenis Surat</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="id_jenis_surat" required>"
                                <option selected="true" value="{{ $show[0]->jenis_surat->id }}">
                                    {{ $show[0]->jenis_surat->jenis_surat }}
                                </option>
                                @foreach ($jenis_surats as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_surat }}</option>
                                @endforeach

                            </select>
                            @error('id_jenis_surat')
                                <label class="error mt-2 text-danger" for="id_jenis_surat">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_divisi') has-danger @enderror ">
                            <label>Dari</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="id_divisi" required>"
                                <option selected="true" value="{{ $show[0]->divisi->id }}">
                                    {{ $show[0]->divisi->nama_divisi }}
                                </option>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach

                            </select>
                            @error('id_divisi')
                                <label class="error mt-2 text-danger" for="id_divisi">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="form-group @error('kepada_surat_keluar') has-danger @enderror">
                            <label for="kepada_surat_keluar">Kepada</label>
                            <input type="text" class="form-control" id="kepada_surat_keluar" name="kepada_surat_keluar"
                                placeholder="Kepada" value="{{ $show[0]->kepada_surat_keluar }}" required>
                            @error('kepada_surat_keluar')
                                <label class="error mt-2 text-danger" for="kepada_surat_keluar">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nomor_agenda') has-danger @enderror">
                            <label for="nomor_agenda">No Agenda</label>
                            <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda"
                                placeholder="No Agenda" value="{{ $show[0]->nomor_agenda }}" required>
                            @error('nomor_agenda')
                                <label class="error mt-2 text-danger" for="nomor_agenda">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nomor_surat_keluar') has-danger @enderror">
                            <label for="nomor_surat_keluar">No Surat</label>
                            <input type="text" class="form-control" id="nomor_surat_keluar" name="nomor_surat_keluar"
                                placeholder="No Surat" value="{{ $show[0]->nomor_surat_keluar }}" required>
                            @error('nomor_surat_keluar')
                                <label class="error mt-2 text-danger" for="nomor_surat_keluar">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('deskripsi_surat_keluar') has-danger @enderror">
                            <label for="deskripsi_surat_keluar">Ringkasan</label>
                            <textarea class="form-control" id="deskripsi_surat_keluar" name="deskripsi_surat_keluar" placeholder="Ringkasan"
                                cols="3" rows="4" required>{{ $show[0]->deskripsi_surat_keluar }}</textarea>
                            @error('deskripsi_surat_keluar')
                                <label class="error mt-2 text-danger" for="deskripsi_surat_keluar">{{ $message }}</label>
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
