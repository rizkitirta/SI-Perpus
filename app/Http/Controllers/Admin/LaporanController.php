<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $breadcrumb = 'Laporan';
        $data = Peminjaman::get();
        $users = User::whereNull('status')->get();

        return view('admin.laporan.index', compact('breadcrumb', 'data', 'users'));
    }

    public function periode(Request $request)
    {
        $breadcrumb = 'Laporan/Periode';
        $users = User::whereNull('status')->get();

        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'user' => 'required',
        ]);

        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $user = $request->user;

        if ($user == 'all') {
            $data = Peminjaman::where('tanggal', '>=', $tgl_awal)
                ->where('tanggal', '<=', $tgl_akhir)->get();
        } else {
            $data = Peminjaman::where('tanggal', '>=', $tgl_awal)
                ->where('tanggal', '<=', $tgl_akhir)
                ->where('user', $user)->get();

        }

        return view('admin.laporan.index', compact('breadcrumb', 'data', 'users'));

    }
}
