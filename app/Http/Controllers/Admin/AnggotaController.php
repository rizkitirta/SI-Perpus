<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $breadcrumb = 'Anggota-Perpustakaan';
        $data = User::where('status', null)->get();

        return view('admin.anggota.index', compact('breadcrumb', 'data'));
    }

    public function add()
    {
        $breadcrumb = 'Tambah-Anggota';
        return view('admin.anggota.add', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect(route('anggota.index'))->with('success', 'Anggota Berhasil Ditambahkan');

    }

    public function edit($id)
    {
        $breadcrumb = 'Edit-Anggota';
        $data = User::findOrFail($id);

        return view('admin.anggota.edit', compact('breadcrumb', 'data'));
    }

    public function update(Request $request,$id)
    {
        $data = User::findOrFail($id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

       
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect(route('anggota.index'))->with('success', 'Anggota Berhasil Ditambahkan');

    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
