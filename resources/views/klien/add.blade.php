@extends('sidebar')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Klien</h4>
                <form class="forms-sample" method="post" action="{{route('klien.store')}}">
                @csrf
                <div class="form-group row">
                    <label for="id_klien" class="col-sm-3 col-form-label">ID Klien</label>
                    <div class="col-sm-9 text-dark">
                        <input type="number" class="form-control text-dark" id="id_klien" name="id_klien" placeholder="Masukkan ID">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_klien" class="col-sm-3 col-form-label">Nama Klien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_klien" name="nama_klien" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="industri" class="col-sm-3 col-form-label">Industri</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="industri" name="industri" placeholder="Masukkan Industri Klien">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{route('klien.index')}}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop