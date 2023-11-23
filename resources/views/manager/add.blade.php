@extends('layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Manager</h5>
        <form method="post" action="{{route('manager.store')}}">
            @csrf
            <div class="mb-3">
                <label for="id_manager" class="form-label">ID Manager</label>
                <input type="number" class="form-control" id="id_manager" name="id_manager">
            </div>
            <div class="mb-3">
                <label for="nama_manager" class="form-label">Nama Manager</label>
                <input type="text" class="form-control" id="nama_manager" name="nama_manager">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop