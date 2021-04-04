<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material_dashboard/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('material_dashboard/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('admin.layouts.css')
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white"
            data-image="{{ asset('material_dashboard/assets/img/sidebar-1.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a class="simple-text logo-normal">
                    SIPerpus <i class="material-icons">computer</i>
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    @if (Auth::user()->status == 1)
                        <li class="nav-item {{ Request::path() == 'admin/dashboard' ? 'active' : '' }} ">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'admin/category/list' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="material-icons">category</i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'admin/book/list' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('book.index') }}">
                            <i class="material-icons">book</i>
                            <p>Book</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'admin/peminjaman' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('index.pinjam.buku') }}">
                            <i class="material-icons">person</i>
                            <p>Peminjaman</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'admin/pengembalian-buku' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengembalian.index') }}">
                            <i class="material-icons">bubble_chart</i>
                            <p>Pengembalian</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'admin/anggota-perpustakaan' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('anggota.index') }}">
                            <i class="material-icons">persons</i>
                            <p>Anggota</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item ">
                        <a class="nav-link" href="./notifications.html">
                            <i class="material-icons">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="material-icons">logout</i>
                            <p>Logout</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav mt-1">
                            <li>
                                <i class="material-icons">person</i>
                            </li>
                            <li>
                                <a>{{ Auth::user()->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="http://www.github.com/rizkitirta">
                                    Github
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())

                        </script>, RizkyTirta <i class="material-icons">favorite</i>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('admin.layouts.script')
    @yield('script')
</body>

</html>
