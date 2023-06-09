<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Divisi::orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.divisi.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' => User::get()
        ];
        return view("admin.divisi.add", $data);
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
            'nama_divisi' => 'required',
        ]);
        Divisi::create($Datas);
        return redirect('divisi')->with('alert', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $id)
    {
        $data = [
            'show' => $id,
            'user' => User::get()
        ];
        return view("admin.divisi.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $id)
    {
        $Datas = $request->validate([
            'nama_divisi' => 'required',
        ]);

        Divisi::where('id', $id->id)->update($Datas);
        return redirect('divisi')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Divisi::destroy($request->id);
        return redirect('divisi')->with('alert', 'Data berhasil dihapus');
    }
}
