@extends('layouts.adminlist')
@section('title')
    <title>List Surat Keluar</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Surat Keluar</h4>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="text-right mb-2">
                            <a href="{{ url('surat_keluar/add') }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Tambah Surat Keluar</button></a>
                        </div>
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Tgl Terima</th>
                                    <th>No Agenda</th>
                                    <th>No Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Ringkasan</th>
                                    <th>Dari</th>
                                    <th>Kepada</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Ket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->created_at }}</td>
                                        <td>{{ $list->nomor_agenda }}</td>
                                        <td>{{ $list->nomor_surat_keluar }}</td>
                                        <td>{{ $list->tanggal_surat }}</td>
                                        <td>{{ $list->deskripsi_surat_keluar }}</td>
                                        <td>{{ $list->divisi->nama_divisi }}</td>
                                        <td>{{ $list->kepada_surat_keluar }}</td>
                                        <td>{{ $list->jenis_surat->kode_jenis_surat }}</td>
                                        {{-- <td>{{ $list->disposisi->nama_disposisi }}</td> --}}
                                        <td></td>
                                        <td>
                                            <a href="{{ url('surat_keluar/edit/' . $list->id . '') }}"
                                                class="btn btn-outline-info"><i class="mdi mdi-pencil"></i></a>
                                            {{-- <a href="{{ url('surat_keluar/details/' . $list->id . '') }}"
                                                class="btn btn-outline-primary"><i class="mdi mdi-printer"></i></a> --}}
                                            <form action="{{ url('surat_keluar/delete/' . $list->id) }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                {{-- <input type="hidden" name="id" value="{{ $list->id }}"> --}}
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus ?');"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </form>

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
