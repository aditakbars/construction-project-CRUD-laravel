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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Klien</h5>
        <form method="post" action="{{ route('klien.update', $data->id_klien) }}">
            @csrf
            <div class="mb-3">
                <label for="nama_klien" class="form-label">Nama Klien</label>
                <input type="text" class="form-control" id="nama_klien" name="nama_klien" value="{{ $data->nama_klien }}">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $data->telepon }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>
            <div class="mb-3">
                <label for="industri" class="form-label">Industri</label>
                <input type="text" class="form-control" id="industri" name="industri" value="{{ $data->industri }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop