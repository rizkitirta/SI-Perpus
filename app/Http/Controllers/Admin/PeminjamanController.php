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

    public function store($id)
    {
        $validasi = DB::table('books')->where('id', $id)->where('stock', '>', 0)->where('status', 1)->count();
        if ($validasi > 0) {
            DB::table('peminjaman')->insert([
                'buku' => $id,
                'user' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $book = DB::table('books')->where('id',$id)->first();
            $old_stock = $book->stock;
            $new_stock = $old_stock - 1;
            DB::table('books')->where('id',$id)->update([
                'stock' => $new_stock
            ]);

            return redirect(route('book.index'))->with('success', 'Buku Berhasil Dipinjam!');

        } else {
            return redirect(route('book.index'))->with('gagal', 'Buku Gagal Dipinjam!');
        }

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
