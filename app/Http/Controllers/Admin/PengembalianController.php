<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $breadcrumb = 'Pengembalian';
        $data = Peminjaman::whereIN('status', [1, 3])->get();

        return view('admin.pengembalian.index', compact('breadcrumb', 'data'));
    }

    public function pengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 3,
        ]);

        $id_buku = $peminjaman->buku;
        $buku = Buku::findOrFail($id_buku);
        $stock_old = $buku->stock;
        $stock_now = $stock_old + 1;

        Buku::where('id', $id_buku)->update([
            'stock' => $stock_now,
        ]);

        return back()->with('success', 'Buku Berhasil Dikembalikan');
    }

    public function clear_riwayat($id)
    {
        Peminjaman::findOrFail($id)->delete();
        return back()->with('success','Data Berhasil Dihapus');
    }
}
