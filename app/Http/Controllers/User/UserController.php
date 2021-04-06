<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = 'User';
        $mybook = Peminjaman::where('user', Auth::user()->id)->count();
        $totalBuku = Buku::count();
        return view('user.index', compact('breadcrumb', 'mybook', 'totalBuku'));
    }

    public function mybook()
    {
        $breadcrumb = 'My-Book';

        $data = Peminjaman::where('user', Auth::user()->id)->get();
        return view('user.mybook', compact('data', 'breadcrumb'));
    }

    public function Peminjaman()
    {
        $breadcrumb = 'Koleksi';

        $data = Buku::get();
        return view('user.koleksi', compact('data', 'breadcrumb'));
    }

    public function Pinjam_Buku($id)
    {
        $validasi = DB::table('books')->where('id', $id)->where('stock', '>', 0)->where('status', 1)->count();
        if ($validasi > 0) {
            DB::table('peminjaman')->insert([
                'buku' => $id,
                'user' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'tanggal' => date('Y-m-d'),
            ]);

            $book = DB::table('books')->where('id', $id)->first();
            $old_stock = $book->stock;
            $new_stock = $old_stock - 1;
            DB::table('books')->where('id', $id)->update([
                'stock' => $new_stock,
            ]);

            return redirect(route('user.mybook'))->with('success', 'Buku Berhasil Dipinjam!');

        } else {
            return redirect(route('book.index'))->with('gagal', 'Buku Gagal Dipinjam!');
        }

    }

}
