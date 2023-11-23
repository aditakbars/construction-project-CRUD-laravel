@extends('sidebar')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                <h4 class="card-title mb-sm-0">Daftar Vendor yang Sudah Terhapus</h4>
                <form action="{{route('vendor.trash')}}" method="GET" class="mr-0 ml-auto mb-1 mb-sm-0">
                    <input type="text" name="search" class="form-control rounded-1 text-dark" placeholder="Cari Vendor..." value="{{$searchTerm}}">
                </form>
                </div>
                <div class="table-responsive border rounded p-1 ">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">ID vendor</th>
                                <th class="font-weight-bold">Nama Vendor</th>
                                <th class="font-weight-bold">No. Telepon</th>
                                <th class="font-weight-bold">Alamat</th>
                                <th class="font-weight-bold">Jenis Vendor</th>
                                <th class="font-weight-bold">Action</th>
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
                                    <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $data->id_vendor }}">Pulihkan</button>
                                    <button type="button" class="btn btn-outline-danger p-2 ml-1" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_vendor }}">Delete</button>

                                    <!-- Modals -->
                                    <div class="modal fade" id="restoreModal{{ $data->id_vendor }}" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ route('vendor.restore', $data->id_vendor) }}">
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
                                    <div class="modal fade" id="hapusModal{{ $data->id_vendor }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('vendor.remove', $data->id_vendor) }}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@stop