@extends('layouts.adminlist')
@section('title')
    <title>List Surat Masuk</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Surat Masuk</h4>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="text-right mb-2">
                            <a href="{{ url('surat_masuk/add') }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Tambah Surat Masuk</button></a>
                        </div>
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No Agenda</th>
                                    <th>No Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Ringkasan</th>
                                    <th>Dari</th>
                                    <th>Kepada</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->nomor_agenda }}</td>
                                        <td>{{ $list->nomor_surat_masuk }}</td>
                                        <td>{{ $list->tanggal_surat }}</td>
                                        <td>{{ $list->deskripsi_surat_masuk }}</td>
                                        <td>{{ $list->sumber_surat_masuk }}</td>
                                        <td>{{ $list->divisi->nama_divisi }}</td>
                                        <td>{{ $list->jenis_surat->kode_jenis_surat }}</td>
                                        <td>
                                            <a href="{{ url('surat_masuk/edit/' . $list->id . '') }}"
                                                class="btn btn-outline-info"><i class="mdi mdi-pencil"></i></a>
                                            <a target="_blank"
                                                href="{{ url('storage/surat_masuk/' . $list->file_surat . '') }}"
                                                class="btn btn-outline-primary"><i class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
