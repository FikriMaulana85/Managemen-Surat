<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => User::with(['role'])->orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.users.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' => User::get(),
            'role' => Role::all()
        ];
        return view("admin.users.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Datas = $request->validate([
            'id_role' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);
        $Datas['password'] = bcrypt($request->password);
        User::create($Datas);
        return redirect('users')->with('alert', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(User::with(['role'])->where("id", $id)->get());
        $data = [
            'show' => User::with(['role'])->where("id", $id)->get(),
            'role' => Role::all()
        ];
        return view("admin.users.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $Datas = $request->validate([
            'id_role' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required',
        ]);
        if ($request->password != null) {
            $Datas['password'] = bcrypt($request->password);
        }
        User::where('id', $id->id)->update($Datas);
        return redirect('users/edit/' . $id->id . '')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect('users')->with('alert', 'Data berhasil dihapus');
    }
}
