<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disposisi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Disposisi::orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.disposisi.list", $data);
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
        return view("admin.disposisi.add", $data);
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
            'nama_disposisi' => 'required',
        ]);
        Disposisi::create($Datas);
        return redirect('disposisi')->with('alert', 'Data berhasil disimpan.');
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
    public function edit(disposisi $id)
    {
        $data = [
            'show' => $id,
            'user' => User::get()
        ];
        return view("admin.disposisi.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, disposisi $id)
    {
        $Datas = $request->validate([
            'nama_disposisi' => 'required',
        ]);

        Disposisi::where('id', $id->id)->update($Datas);
        return redirect('disposisi')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Disposisi::destroy($request->id);
        return redirect('disposisi')->with('alert', 'Data berhasil dihapus');
    }
}
