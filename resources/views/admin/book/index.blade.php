@extends('admin.layouts.master')
@section('title', 'Book')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="javascript:history.back()" class="btn btn-sm btn-primary">back</a>
    </p>

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "></h4>
            <p class="card-category">Mangement Buku</p>
            <a href="{{ route('book.add') }}" class="btn btn-sm btn-warning">Tambah Buku</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            #
                        </th>
                        <th>
                            Gambar
                        </th>
                        <th>
                            Judul
                        </th>
                        <th>
                            Penulis
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Keterangan
                        </th>
                        <th>
                            Stock
                        </th>
                        <th>
                            Created At
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($books as $e => $book)
                            <tr>
                                <td>
                                    {{ $e + 1 }}
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/' . $book->gambar) }}" alt="gambar" style="width: 70px">
                                </td>
                                <td>
                                    {{ $book->judul }}
                                </td>
                                <td>
                                    {{ $book->penulis }}
                                </td>
                                <td>
                                    {{ $book->nama_kategory }}
                                </td>
                                <td>
                                    {{ $book->keterangan }}
                                </td>
                                <td>
                                    {{ $book->stock }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($book->created_at)) }}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('book.edit', $book->id) }}"><i
                                            class="material-icons">edit</i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data?
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-sm btn-primary">Oke</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
