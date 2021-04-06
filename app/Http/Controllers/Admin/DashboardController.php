<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breadcrumb = 'Dashboard';
        $data = Peminjaman::paginate(5);
        $users = User::whereNull('status')->get();
        $total_user = User::count();
        $total_buku = Buku::count();
        $total_peminjaman = Peminjaman::count();
        $total_category = Category::count();

        
        if (Auth::user()->status == 1) {
            return view('admin.dashboard.index', compact(
                'breadcrumb',
                 'data', 
                 'users',
                 'total_user',
                 'total_buku',
                 'total_peminjaman',
                 'total_category',
                ));
        }

        return redirect(route('user.index'));
    }
}