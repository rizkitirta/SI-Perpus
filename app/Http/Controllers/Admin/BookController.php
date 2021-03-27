<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        
    }
}
