@extends('admin.layouts.master')
@section('title', 'Category')
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
            <p class="card-category">Mangement Category</p>
            <a href="{{ route('category.add') }}" class="btn btn-sm btn-warning">Tambah Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $e => $category)
                            <tr>
                                <td>
                                    {{ $e + 1 }}
                                </td>
                                <td>
                                    {{ $category->nama_kategory }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($category->created_at)) }}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('category.edit', $category->id) }}">Edit</a>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#delete">
                                        Delete
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
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
					<form action="{{ route('category.delete', $category->id) }}" method="post">
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
