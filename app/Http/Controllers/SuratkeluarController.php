<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jenissurat;
use App\Models\Suratkeluar;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class SuratkeluarCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Suratmasuk::with(['divisi', 'jenis_surat'])->orderBy('id', 'DESC')->get());
        $data = [
            'lists' => Suratkeluar::with(['divisi', 'jenis_surat'])->orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.surat_keluar.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        return view("admin.surat_keluar.add", $data);
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
            'id_divisi' => 'required',
            'id_jenis_surat' => 'required',
            'nomor_agenda' => 'required',
            'nomor_surat_keluar' => 'required',
            'kepada_surat_keluar' => 'required',
            'deskripsi_surat_keluar' => 'required',
            'tanggal_surat' => 'required',
        ]);
        Suratkeluar::create($Datas);
        return redirect('surat_keluar')->with('alert', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'show' => Suratkeluar::with(['divisi', 'jenis_surat'])->where("id", $id)->get(),
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        $pdf = FacadePdf::loadView('admin.surat_keluar.disposisi', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('disposisi.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'show' => Suratkeluar::with(['divisi', 'jenis_surat'])->where("id", $id)->get(),
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        return view("admin.surat_keluar.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratkeluar $id)
    {
        // dd($request);
        $Datas = $request->validate([
            'id_divisi' => 'required',
            'id_jenis_surat' => 'required',
            'nomor_agenda' => 'required',
            'nomor_surat_keluar' => 'required',
            'kepada_surat_keluar' => 'required',
            'deskripsi_surat_keluar' => 'required',
            'tanggal_surat' => 'required',
        ]);

        Suratkeluar::where('id', $id->id)->update($Datas);
        return redirect('surat_keluar')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Suratkeluar::destroy($request->id);
        return redirect('surat_keluar')->with('alert', 'Data berhasil dihapus');
    }
}
