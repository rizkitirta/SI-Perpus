@extends('admin.layouts.master')
@section('title', 'User')
@section('content')

    <div class="card text-center ">
        <h3 style="font-weight:bold;">Perpustakaan</h3>
        <h4 style="font-weight:bold;">SMP NEGERI 07 KOTABUMI</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">book</i>
                    </div>
                    <p class="card-category">Buku Saya</p>
                    <h3 class="card-title">{{ $mybook }}
                        <small>Buku</small>
                    </h3><br>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('user.mybook') }}">Get More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">category</i>
                    </div>
                    <p class="card-category">Koleksi Perpustakaan</p>
                    <h3 class="card-title">{{ $totalBuku }}</h3>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.peminjaman') }}">Get more</a>
                </div>
            </div>
        </div>
    @endsection
