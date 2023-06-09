@extends('layouts.admin')
@section('title')
    <title>Edit Surat Masuk</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Surat Masuk</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif


                    <form class="forms-sample" action="{{ url('surat_masuk/edit/' . $show[0]->id . '') }}" method="POST">
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

                        <div class="form-group @error('sumber_surat_masuk') has-danger @enderror">
                            <label for="sumber_surat_masuk">Dari</label>
                            <input type="text" class="form-control" id="sumber_surat_masuk" name="sumber_surat_masuk"
                                placeholder="Dari" value="{{ $show[0]->sumber_surat_masuk }}" required>
                            @error('sumber_surat_masuk')
                                <label class="error mt-2 text-danger" for="sumber_surat_masuk">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_divisi') has-danger @enderror ">
                            <label>Kepada</label>
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

                        <div class="form-group @error('nomor_agenda') has-danger @enderror">
                            <label for="nomor_agenda">No Agenda</label>
                            <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda"
                                placeholder="No Agenda" value="{{ $show[0]->nomor_agenda }}" required>
                            @error('nomor_agenda')
                                <label class="error mt-2 text-danger" for="nomor_agenda">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('nomor_surat_masuk') has-danger @enderror">
                            <label for="nomor_surat_masuk">No Surat</label>
                            <input type="text" class="form-control" id="nomor_surat_masuk" name="nomor_surat_masuk"
                                placeholder="No Surat" value="{{ $show[0]->nomor_surat_masuk }}" required>
                            @error('nomor_surat_masuk')
                                <label class="error mt-2 text-danger" for="nomor_surat_masuk">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('deskripsi_surat_masuk') has-danger @enderror">
                            <label for="deskripsi_surat_masuk">Ringkasan</label>
                            <textarea class="form-control" id="deskripsi_surat_masuk" name="deskripsi_surat_masuk" placeholder="Ringkasan"
                                cols="3" rows="4" required>{{ $show[0]->deskripsi_surat_masuk }}</textarea>
                            @error('deskripsi_surat_masuk')
                                <label class="error mt-2 text-danger" for="deskripsi_surat_masuk">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('tanggal_terima') has-danger @enderror">
                            <label for="tanggal_terima">Tanggal Terima</label>
                            <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima"
                                placeholder="Tanggal Terima" value="{{ $show[0]->tanggal_terima }}">
                            @error('tanggal_terima')
                                <label class="error mt-2 text-danger" for="tanggal_terima">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_disposisi') has-danger @enderror ">
                            <label>Status Surat Masuk</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="id_disposisi" required>"
                                <option selected="true" value="{{ $show[0]->disposisi->id }}">
                                    {{ $show[0]->disposisi->nama_disposisi }}
                                </option>
                                @foreach ($disposisis as $disposisi)
                                    <option value="{{ $disposisi->id }}">{{ $disposisi->nama_disposisi }}</option>
                                @endforeach
                            </select>
                            @error('id_disposisi')
                                <label class="error mt-2 text-danger" for="id_disposisi">{{ $message }}</label>
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
