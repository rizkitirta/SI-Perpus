@extends('admin.layouts.master')
@section('content')
<a href="javascript:history.back()" class="btn btn-sm">back</a>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update',$category->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('put') }}
				<label for="" class="label">Masukan Category</label>
                <input type="text" class="form-control" placeholder="Enter Text" autocomplete="off"
			 	value="{{ $category->nama_kategory }}" autofocus name="nama_category">
                <button type="submit" class="btn btn-sm btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
