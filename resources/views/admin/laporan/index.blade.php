@extends('admin.layouts.master')
@section('title', 'Laporan')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "></h4>
            <p class="card-category">Mangement Laporan</p>
        </div>
        <div class="card-body">
			<form method="get" action="{{ route('laporan.periode') }}">
                <div class="row">
                    <div class="col">
						<label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" autocomplete="off" name="tgl_awal">
                    </div>
                    <div class="col">
						<label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" autocomplete="off" name="tgl_akhir">
                    </div>
                    <div class="col">
						<label for="user">User</label>
                        <select name="user" id="user" class="form-control">
							<option selected disabled>Pilih User</option>
							<option value="all">All Anggota</option>
							@foreach ($users as $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
							@endforeach
						</select>
                    </div>
					<div class="col">
						<button type="submit" class="btn btn-sm btn-danger mt-4">Cari</button>
					</div>
                </div>
            </form>
			<a href="{{ route('laporan.index') }}" class="btn btn-sm btn-danger mt-2">All Data</a>
			<hr>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-center">
                        <th>
                            #
                        </th>
                        <th>
                            User
                        </th>
                        <th>
                            Buku
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Tanggal
                        </th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $e => $dt)
                            <tr>
                                <td>
                                    {{ $e + 1 }}
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
                                <td>
                                    {{ date('d-m-Y', strtotime($dt->tanggal)) }}
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
