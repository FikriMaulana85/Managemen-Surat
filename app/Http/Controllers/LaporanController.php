<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suratmasuk;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function surat_masuk()
    {
        $data = [
            'user' => User::get()
        ];
        return view("admin.laporan.lapmasuk", $data);
    }

    public function surat_keluar()
    {
        $data = [
            'user' => User::get()
        ];
        return view("admin.laporan.lapkeluar", $data);
    }

    public function cetak_masuk(Request $request, Suratmasuk $id)
    {
        $data = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'show' => $id->with(['divisi', 'jenis_surat', 'disposisi'])->whereBetween(DB::raw('DATE(created_at)'), [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            'user' => User::get()
        ];
        $pdf = Pdf::loadView('admin.laporan.lapmasuk_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('');
    }

    public function cetak_keluar(Request $request, Suratkeluar $id)
    {
        $data = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'show' => $id->with(['divisi', 'jenis_surat'])->whereBetween(DB::raw('DATE(created_at)'), [$request->tanggal_awal, $request->tanggal_akhir])->get(),
            'user' => User::get()
        ];
        $pdf = Pdf::loadView('admin.laporan.lapkeluar_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('');
    }
}
