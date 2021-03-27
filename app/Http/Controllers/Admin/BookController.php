<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->get();
        return view('admin.book.index',compact('books'));
    }

    public function add()
    {
        $categories = DB::table('categories')->get();
        return view('admin.book.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,gif'
        ]);

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        DB::table('books')->insert([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'stock' => $request->stock,
            'category' => $request->category,
            'penulis' => Auth::user()->id,
            'gambar' => $file->getClientOriginalName(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect(route('book.index'))->with('success','Buku Berhasil Ditambahkan');
    }
}
