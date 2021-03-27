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
                    <label for="category">Example select</label>
                    <select class="form-control" data-style="btn btn-link" id="category" name="category">
                        <option selected="" disabled="">Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-file-upload form-file-simple">
                    <input type="text" class="form-control inputFileVisible" placeholder="Simple chooser...">
                    <input type="file" class="inputFileHidden">
                </div>
            </form>
        </div>
    </div>
@endsection
