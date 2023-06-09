@extends('layouts.adminlist')
@section('title')
    <title>List Users</title>
@endsection
@section('row')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Users</h4>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="text-right mb-2">
                            <a href="{{ url('users/add') }}"><button type="button"
                                    class="btn btn-primary btn-rounded btn-fw"><i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Tambah User</button></a>
                        </div>
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($lists) --}}
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->username }}</td>
                                        <td>{{ $list->nama_lengkap }}</td>
                                        <td>{{ $list->role->nama_role }}</td>
                                        <td>
                                            <a href="{{ url('users/edit/' . $list->id . '') }}"
                                                class="btn btn-outline-info"><i class="mdi mdi-pencil"></i></a>
                                            <form action="{{ url('users/delete/' . $list->id) }}" method="post"
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
