<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = 'User';
        $mybook = Peminjaman::where('user',Auth::user()->id)->count();
        $totalBuku = Buku::count();
        return view('user.index', compact('breadcrumb','mybook','totalBuku'));
    }

    public function mybook()
    {
        $breadcrumb = 'My-Book';

        $data = Peminjaman::where('user',Auth::user()->id)->get();
        return view('user.mybook',compact('data','breadcrumb'));
    }

    public function koleksi()
    {
        $breadcrumb = 'Koleksi';

        $data = Buku::get();
        return view('user.koleksi',compact('data','breadcrumb'));
    }
}
