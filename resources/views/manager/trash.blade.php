@extends('layout')

@section('content')

<h4 class="mt-3">Data Manager yang sudah terhapus</h4>


@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif

<form action="{{route('manager.trash')}}" method="GET" class="mb-3 mt-1">
    <input type="text" name="search" class="form-control rounded-1" placeholder="Cari Manager..." value="{{$searchTerm}}">
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_manager }}</td>
            <td>{{ $data->nama_manager }}</td>
            <td>{{ $data->telepon }}</td>
            <td>{{ $data->alamat }}</td>
            <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                    data-bs-target="#restoreModal{{ $data->id_manager }}">Pulihkan</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_manager }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="restoreModal{{ $data->id_manager }}" tabindex="-1"
                    aria-labelledby="restoreModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="restoreModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>
                            <form method="POST" action="{{ route('manager.restore', $data->id_manager) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin memulihkan data ini?
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
                <div class="modal fade" id="hapusModal{{ $data->id_manager }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>
                            <form method="POST" action="{{ route('manager.remove', $data->id_manager) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini secara permanen?
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