@extends('admin.layouts.master')
@section('title', 'Anggota')
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
            <p class="card-category">Mangement Anggota</p>
            <a href="{{ route('anggota.add') }}" class="btn btn-sm btn-warning">Tambah Anggota</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-center">
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
						<th>
							Email
						</th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody  class="text-center">
                        @foreach ($data as $e => $dt)
                            <tr>
                                <td>
                                    {{ $e + 1 }}
                                </td>
								<td>
									{{ $dt->email }}
								</td>
                                <td>
                                    {{ $dt->name }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($dt->created_at)) }}
                                </td>

                                <td>
                                    <a href="{{ route('anggota.edit', $dt->id) }}"
                                        class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a></a>
                                    <a href="{{ route('anggota.delete', $dt->id) }}"
                                        class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"><i
                                                class="material-icons">delete</i></a></a>
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
