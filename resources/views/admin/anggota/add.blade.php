@extends('admin.layouts.master')
@section('content')
    <a href="javascript:history.back()" class="btn btn-sm">back</a>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Text" autofocus name="name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="" class="label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Text" autofocus name="email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="" class="label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Text" autofocus name="password" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-sm btn-warning">Submit</button>
            </form>
        </div>
    </div>
@endsection
