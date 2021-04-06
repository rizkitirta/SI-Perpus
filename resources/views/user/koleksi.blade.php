@extends('admin.layouts.master')
@section('title', 'Book')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('gagal') }}
        </div>
    @endif

    <div>
        <a href="javascript:history.back()" class="btn btn-sm btn-primary">back</a>
    </div>

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Semua Buku</h4>
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
                            Stock
                        </th>
                        <th>
                            Status
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($data as $e => $book)
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
                                    {{ $book->stock }}
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $book->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $book->status == 1 ? 'Aktive' : 'Non Active' }}</span>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('pinjam.buku', $book->id) }}"
                                        class="btn btn-sm btn-success 
                                           {{ $book->stock < 1 || $book->status < 1 ? 'disabled' : '' }}">Pinjam</a>
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
