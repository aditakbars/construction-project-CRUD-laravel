@extends('layout')

@section('content')

<h4 class="mt-3">Data proyek</h4>

<a href="{{ route('proyek.create') }}" type="button" class="btn btn-primary rounded-3 mb-2">Tambah Data proyek</a>
<a href="{{ route('proyek.trash') }}" type="button" class="btn btn-warning rounded-3 mb-2 ml-2">Data proyek yang sudah dihapus</a>

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif

<form action="{{route('proyek.index')}}" method="GET" class="mb-3 mt-1">
    <input type="text" name="search" class="form-control rounded-1" placeholder="Cari proyek..." value="{{$searchTerm}}">
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Proyek</th>
            <th>Lokasi</th>
            <th>Durasi</th>
            <th>Anggaran</th>
            <th>Manager</th>
            <th>Vendor</th>
            <th>Klien</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_proyek }}</td>
            <td>{{ $data->nama_proyek }}</td>
            <td>{{ $data->lokasi }}</td>
            <td>{{ $data->durasi }}</td>
            <td>{{ $data->anggaran }}</td>
            <td>{{ $data->nama_manager }}</td>
            <td>{{ $data->nama_vendor }}</td>
            <td>{{ $data->nama_klien }}</td>
            <td>
                <a href="{{ route('proyek.edit', $data->id_proyek) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_proyek }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_proyek }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('proyek.delete', $data->id_proyek) }}">
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