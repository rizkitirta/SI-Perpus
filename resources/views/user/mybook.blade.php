@extends('admin.layouts.master')
@section('content')
    <a href="javascript:history.back()" class="btn btn-sm">Back</a>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "></h4>
            <p class="card-category">Buku Saya</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Judul Buku
                        </th>
                        <th>
                            Status
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($data as $e => $item)
                            <tr>
                                <td>
                                    {{ $e + 1 }}
                                </td>
                                <td>
                                    {{ $item->buku_r->judul }}
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('user.peminjaman') }}" class="btn btn-sm">Pinjam Lagi</a>
            </div>
        </div>
    </div>
@endsection
