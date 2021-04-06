@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">User</p>
                    <h3 class="card-title">{{ $total_user }}
                        <small>Member</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="javascript:;">More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">book</i>
                    </div>
                    <p class="card-category">Total Buku</p>
                    <h3 class="card-title">{{ $total_buku }}
                      <br>
                        <small>Item</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="javascript:;">More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">book</i>
                    </div>
                    <p class="card-category">Buku Dipinjam</p>
                    <h3 class="card-title">{{ $total_peminjaman }}
                        <small>Buku Dipinjam</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="javascript:;">More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">category</i>
                    </div>
                    <p class="card-category">Category</p>
                    <h3 class="card-title">{{ $total_category }}
                        <small>Category</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="javascript:;">More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "></h4>
                <p class="card-category">Riwayat Peminjaman</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Book
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Tanggal
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($data as $e=>$dt)
                                <tr>
                                    <td>
                                        {{ $dt->id }}
                                    </td>
                                    <td>
                                        {{ $dt->user_r->name }}
                                    </td>
                                    <td>
                                        {{ $dt->buku_r->judul }}
                                    </td>
                                    <td>
                                        {{ $dt->status_r->name }}
                                    </td>
                                    <td class="text-primary">
                                        {{ $dt->tanggal }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{ $data->links() }}
                    </table>
                </div>
            </div>
        </div>
    @endsection
