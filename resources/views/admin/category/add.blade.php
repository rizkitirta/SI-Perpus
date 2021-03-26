@extends('admin.layouts.master')
@section('content')
<a href="javascript:history.back()" class="btn btn-sm">back</a>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
				{{ csrf_field() }}
				<label for="" class="label">Masukan Category</label>
                <input type="text" class="form-control" placeholder="Enter Text" autofocus name="nama_category">
                <button type="submit" class="btn btn-sm btn-warning">Submit</button>
            </form>
        </div>
    </div>
@endsection
