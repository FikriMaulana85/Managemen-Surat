@extends('layouts.admin')
@section('title')
    <title>Edit User</title>
@endsection
@section('row')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    @if (session()->has('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif


                    <form class="forms-sample" action="{{ url('users/edit/' . $show[0]->id . '') }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group @error('nama_lengkap') has-danger @enderror">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Lengkap" value="{{ $show[0]->nama_lengkap }}" required>
                            @error('nama_lengkap')
                                <label class="error mt-2 text-danger" for="nama_lengkap">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('username') has-danger @enderror">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                value="{{ $show[0]->username }}" required>
                            @error('username')
                                <label class="error mt-2 text-danger" for="username">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('password') has-danger @enderror">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <p class="text-sm text-danger">*Kosongkan jika tidak ingin merubah password</p>
                            @error('password')
                                <label class="error mt-2 text-danger" for="password">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group @error('id_role') has-danger @enderror ">
                            <label>Jenis Surat</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%"
                                tabindex="-1" aria-hidden="true" name="id_role" required>"
                                <option selected="true" value="{{ $show[0]->role->id }}">{{ $show[0]->role->nama_role }}
                                </option>
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                @endforeach

                            </select>
                            @error('id_role')
                                <label class="error mt-2 text-danger" for="id_role">{{ $message }}</label>
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
