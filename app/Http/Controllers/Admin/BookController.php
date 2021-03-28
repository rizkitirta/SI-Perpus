<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books as b')
            ->join('categories as c', 'b.kategory', '=', 'c.id')
            ->select('b.id', 'b.gambar', 'b.judul', 'b.penulis', 'b.stock', 'b.created_at', 'b.keterangan', 'c.nama_kategory')
            ->get();
        return view('admin.book.index', compact('books'));
    }

    public function add()
    {
        $categories = DB::table('categories')->get();
        return view('admin.book.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'penulis' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        DB::table('books')->insert([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'stock' => $request->stock,
            'kategory' => $request->category,
            'penulis' => $request->penulis,
            'gambar' => $file->getClientOriginalName(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect(route('book.index'))->with('success', 'Buku Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.book.edit', compact('categories', 'book'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'penulis' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);

        $file = $request->file('image');
        if ($file) {
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());

            DB::table('books')->where('id', $id)->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'stock' => $request->stock,
                'kategory' => $request->category,
                'penulis' => $request->penulis,
                'gambar' => $file->getClientOriginalName(),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        } else {
            DB::table('books')->where('id', $id)->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'stock' => $request->stock,
                'kategory' => $request->category,
                'penulis' => $request->penulis,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect(route('book.index'))->with('success', 'Buku Berhasil Diupdate');
    }
}
