<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jenissurat;
use App\Models\Suratkeluar;
use App\Models\Suratmasuk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totaldivisi' => Divisi::count(),
            'totaljenissurat' => Jenissurat::count(),
            'totalsuratmasuk' => Suratmasuk::count(),
            'totalsuratkeluar' => Suratkeluar::count(),
        ];
        return view("admin.dashboard.index", $data);
    }
}
