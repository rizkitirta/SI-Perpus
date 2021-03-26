<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_category' => 'required'
        ]);

        DB::table('categories')->insert([
            'nama_kategory' => $request->nama_category,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect(route('category.index'))->with('success','Category Berhasil Ditambahkan');
    }

     public function edit($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
          $this->validate($request, [
            'nama_category' => 'required'
        ]);

        DB::table('categories')->where('id',$id)->update([
            'nama_kategory' => $request->nama_category,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect(route('category.index'))->with('success','Category Berhasil Diupdate');
    }
    
    public function delete($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect(route('category.index'))->with('success', 'Category Berhasil Dihapus');
    }
    
}
