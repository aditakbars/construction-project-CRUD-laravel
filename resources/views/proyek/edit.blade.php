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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Proyek</h5>
        <form method="post" action="{{ route('proyek.update', $data->id_proyek) }}">
            @csrf
            <div class="mb-3">
                <label for="nama_proyek" class="form-label">Nama proyek</label>
                <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="{{ $data->nama_proyek }}">
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $data->lokasi }}">
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="text" class="form-control" id="durasi" name="durasi" value="{{ $data->durasi }}">
            </div>
            <div class="mb-3">
                <label for="anggaran" class="form-label">Anggaran</label>
                <input type="text" class="form-control" id="anggaran" name="anggaran" value="{{ $data->anggaran }}">
            </div>
            <div class="mb-3">
                <label for="manager" class="form-label">Manager</label>
                <select class="form-select" aria-label="Default select example" name="id_manager" id="id_manager">
                    @foreach ($managers as $manager)
                    <option value="{{$manager->id_manager}}">{{$manager->id_manager}} - {{$manager->nama_manager}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="vendor" class="form-label">vendor</label>
                <select class="form-select" aria-label="Default select example" name="id_vendor" id="id_vendor">
                    @foreach ($vendors as $vendor)
                    <option value="{{$vendor->id_vendor}}">{{$vendor->id_vendor}} - {{$vendor->nama_vendor}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="klien" class="form-label">klien</label>
                <select class="form-select" aria-label="Default select" name="id_klien" id="id_klien">
                    @foreach ($kliens as $klien)
                    <option value="{{$klien->id_klien}}">{{$klien->id_klien}} - {{$klien->nama_klien}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop