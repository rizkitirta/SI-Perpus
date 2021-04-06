<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $breadcrumb = 'Detail Peminjaman';
        $data = Peminjaman::get();

        return view('admin.peminjaman.index',compact('breadcrumb','data'));
    }


    public function setujui($id)
    {
        Peminjaman::where('id',$id)->first()->update([
            'status' => 1   
        ]);

        return back()->with('success','Peminjaman Berhasil Disetujui');
    }

    public function tolak($id)
    {
        Peminjaman::where('id',$id)->first()->update([
            'status' => 2   
        ]);

        return back()->with('success','Peminjaman Berhasil Ditolak');
    }

    public function batalkan($id)
    {
        Peminjaman::where('id',$id)->first()->update([
            'status' => 0   
        ]);

        return back()->with('success','Status Berhasil Dibatalkan');
    }
}
