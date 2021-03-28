@extends('admin.layouts.master')
@section('title', 'Book')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="javascript:history.back()" class="btn btn-sm btn-primary">back</a>
        <a href="{{ route('book.stock') }}" class="btn btn-sm btn-default">Buku Stock Kosong</a>
    </div>

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
                            Status
                        </th>
                        <th>
                            On/Off
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
                                    <span
                                        class="badge {{ $book->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $book->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                </td>
                                <td>
                                    @if ($book->status == 0)
                                        <a href="{{ route('book.status', $book->id) }}" class="btn btn-sm btn-default"><i
                                                class="material-icons">toggle_off</i></a>
                                    @else
                                        <a href="{{ route('book.status', $book->id) }}" class="btn btn-sm btn-success"><i
                                                class="material-icons">toggle_on</i></a>
                                    @endif
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($book->created_at)) }}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('book.edit', $book->id) }}"><i
                                            class="material-icons">edit</i></a>
                                    <a href="{{ route('book.delete', $book->id) }}"
                                        class="btn btn-sm btn-danger btn-delete"><i class="material-icons">delete</i></a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin?
                </div>

                <div class="modal-footer">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-white">Ok, Got it</button>
                    </form>
                    <button type="button" class="btn btn-link -auto" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('body').on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#modal-delete').find('form').attr('action', url);
                $('#modal-delete').modal();
            });

        })

    </script>
@endsection
