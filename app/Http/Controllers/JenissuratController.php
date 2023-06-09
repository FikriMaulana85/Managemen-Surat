<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenissurat;
use Illuminate\Http\Request;

class JenissuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lists' => Jenissurat::orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.jenis_surat.list", $data);
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
        return view("admin.jenis_surat.add", $data);
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
            'kode_jenis_surat' => 'required|unique:jenissurats',
            'jenis_surat' => 'required',
        ]);
        Jenissurat::create($Datas);
        return redirect('jenis_surat')->with('alert', 'Data berhasil disimpan.');
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
    public function edit(Jenissurat $id)
    {
        $data = [
            'show' => $id,
            'user' => User::get()
        ];
        return view("admin.jenis_surat.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenissurat $id)
    {
        $Datas = $request->validate([
            'kode_jenis_surat' => 'required',
            'jenis_surat' => 'required',
        ]);

        if ($request->kode_jenis_surat != $id->kode_jenis_surat) {
            $rules['kode_jenis_surat'] = 'required|unique:jenissurats';
        }
        Jenissurat::where('id', $id->id)->update($Datas);
        return redirect('jenis_surat/edit/' . $id->id . '')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Jenissurat::destroy($request->id);
        return redirect('jenis_surat')->with('alert', 'Data berhasil dihapus');
    }
}
