<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $breadcrumb = 'All-Book';
        // $books = DB::table('books as b')
        //     ->join('categories as c', 'b.kategory', '=', 'c.id')
        //     ->select('b.id', 'b.gambar', 'b.judul', 'b.penulis', 'b.stock', 'b.created_at', 'b.keterangan', 'b.status', 'c.nama_kategory')
        //     ->get();

        $books = Buku::get();
        return view('admin.book.index', compact('books','breadcrumb'));
    }

    public function stock()
    {
        $breadcrumb = 'Stock-Kosong';
        // $books = DB::table('books as b')
        //     ->join('categories as c', 'b.kategory', '=', 'c.id')
        //     ->select('b.id', 'b.gambar', 'b.judul', 'b.penulis', 'b.stock', 'b.created_at', 'b.keterangan', 'b.status', 'c.nama_kategory')
        //     ->where('b.stock', '<', 1)
        //     ->get();
        $books = Buku::where('stock','<',1)->get();
        return view('admin.book.index', compact('books','breadcrumb'));
    }

    public function active()
    {
        $breadcrumb = 'Active-Book';
        // $books = DB::table('books as b')
        //     ->join('categories as c', 'b.kategory', '=', 'c.id')
        //     ->select('b.id', 'b.gambar', 'b.judul', 'b.penulis', 'b.stock', 'b.created_at', 'b.keterangan', 'b.status', 'c.nama_kategory')
        //     ->where('b.status', '=', 1)
        //     ->get();
        $books = Buku::where('status','=',1)->get();
        return view('admin.book.index', compact('books','breadcrumb'));
    }

    public function NonActive()
    {
        $breadcrumb = 'Non-Active-Book';
        // $books = DB::table('books as b')
        //     ->join('categories as c', 'b.kategory', '=', 'c.id')
        //     ->select('b.id', 'b.gambar', 'b.judul', 'b.penulis', 'b.stock', 'b.created_at', 'b.keterangan', 'b.status', 'c.nama_kategory')
        //     ->where('b.status', '=', 0)
        //     ->get();
        $books = Buku::where('status', '=', 0)->get();
        return view('admin.book.index', compact('books','breadcrumb'));
    }

    public function add()
    {
        $breadcrumb = 'Add-Book';
        $categories = DB::table('categories')->get();
        return view('admin.book.add', compact('categories','breadcrumb'));
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
        $breadcrumb = 'Edit-Book';
        $book = DB::table('books')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.book.edit', compact('categories', 'book','breadcrumb'));
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

    public function delete($id)
    {

        DB::table('books')->where('id', $id)->delete();
        return redirect(route('book.index'))->with('success', 'Buku Berhasil Dihapus');
    }

    public function status($id)
    {
        $data = DB::table('books')->where('id', $id)->first();
        $status = $data->status;

        if ($status == 1) {
            DB::table('books')->where('id', $id)->update([
                'status' => 0,
            ]);
        } else {
            DB::table('books')->where('id', $id)->update([
                'status' => 1,
            ]);
        }

        return redirect(route('book.index'))->with('success', 'Status Berhasil Diubah');

    }
}
