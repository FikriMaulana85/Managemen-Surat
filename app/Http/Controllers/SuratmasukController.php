<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Barryvdh\DomPDF\PDF;
use App\Models\Disposisi;
use App\Models\Jenissurat;
use App\Models\Suratmasuk;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class SuratmasukController extends Controller
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
            'lists' => Suratmasuk::with(['divisi', 'jenis_surat', 'disposisi'])->orderBy('id', 'DESC')->get(),
            'user' => User::get()
        ];
        return view("admin.surat_masuk.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'disposisis' => Disposisi::all(),
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        return view("admin.surat_masuk.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $Datas = $request->validate([
            'id_divisi' => 'required',
            'id_jenis_surat' => 'required',
            'id_disposisi' => 'required',
            'nomor_agenda' => 'required',
            'nomor_surat_masuk' => 'required',
            'sumber_surat_masuk' => 'required',
            'deskripsi_surat_masuk' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_terima' => '',
        ]);
        Suratmasuk::create($Datas);
        return redirect('surat_masuk')->with('alert', 'Data berhasil disimpan.');
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
            'show' => Suratmasuk::with(['divisi', 'jenis_surat', 'disposisi'])->where("id", $id)->get(),
            'disposisis' => Disposisi::all(),
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        // return view("admin.surat_masuk.disposisi");
        $pdf = FacadePdf::loadView('admin.surat_masuk.disposisi', $data)->setPaper('a4', 'potrait');
        // return $pdf->download('disposisi.pdf');
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
            'show' => Suratmasuk::with(['divisi', 'jenis_surat', 'disposisi'])->where("id", $id)->get(),
            'disposisis' => Disposisi::all(),
            'jenis_surats' => Jenissurat::all(),
            'divisis' => Divisi::all(),
            'user' => User::get()
        ];
        return view("admin.surat_masuk.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratmasuk $id)
    {
        // dd($request);
        $Datas = $request->validate([
            'id_divisi' => 'required',
            'id_jenis_surat' => 'required',
            'id_disposisi' => 'required',
            'nomor_agenda' => 'required',
            'nomor_surat_masuk' => 'required',
            'sumber_surat_masuk' => 'required',
            'deskripsi_surat_masuk' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_terima' => '',
        ]);

        Suratmasuk::where('id', $id->id)->update($Datas);
        return redirect('surat_masuk')->with('alert', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Suratmasuk::destroy($request->id);
        return redirect('surat_masuk')->with('alert', 'Data berhasil dihapus');
    }
}
