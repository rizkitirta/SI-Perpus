<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function store($id)
    {
        DB::table('peminjaman')->insert([
            'buku' => $id,
            'user' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect(route('book.index'))->with('success','Buku Berhasil Dipinjam!');

    }
}
