@extends('admin.layouts.master')
@section('content')
    <p>
        <a href="javascript:history.back()" class="btn btn-sm btn-primary">back</a>
    </p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" placeholder="Nama/judul Buku" autofocus
                        autocomplete="off" name="judul" value="{{ $book->judul }}">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis Buku</label>
                    <input type="text" class="form-control" id="penulis" placeholder="Penulis Buku" autofocus
                        autocomplete="off" name="penulis" value="{{ $book->penulis }}">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3"
                        name="keterangan">{{ $book->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" placeholder="Masukan stock" autocomplete="off"
                        name="stock" value="{{ $book->stock }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" data-style="btn btn-link" id="category" name="category">
                        <option selected="" disabled="">Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $book->kategory == $category->id ? 'selected' : '' }}>{{ $category->nama_kategory }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
