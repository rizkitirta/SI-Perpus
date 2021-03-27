@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" placeholder="Nama/judul Buku" autofocus
                        autocomplete="off" name="judul">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" placeholder="Masukan stock" autocomplete="off"
                        name="stock">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" data-style="btn btn-link" id="category" name="category">
                        <option selected="" disabled="">Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->nama_kategory }}">{{ $category->nama_kategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
            </form>
        </div>
    </div>

@endsection
