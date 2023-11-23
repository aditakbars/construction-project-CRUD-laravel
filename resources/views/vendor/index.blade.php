@extends('layout')

@section('content')

<h4 class="mt-3">Data Vendor</h4>

<a href="{{ route('vendor.create') }}" type="button" class="btn btn-primary rounded-3 mb-2">Tambah Data Vendor</a>
<a href="{{ route('vendor.trash') }}" type="button" class="btn btn-warning rounded-3 mb-2">Data Vendor yang sudah dihapus</a>

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif

<form action="{{route('vendor.index')}}" method="GET" class="mb-3 mt-1">
    <input type="text" name="search" class="form-control rounded-1" placeholder="Cari Vendor..." value="{{$searchTerm}}">
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Jenis</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_vendor }}</td>
            <td>{{ $data->nama_vendor }}</td>
            <td>{{ $data->telepon }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->jenis }}</td>
            <td>
                <a href="{{ route('vendor.edit', $data->id_vendor) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_vendor }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_vendor }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('vendor.delete', $data->id_vendor) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop