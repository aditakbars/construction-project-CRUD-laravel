@extends('sidebar')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ubah Data Klien</h4>
                <form class="forms-sample" method="post" action="{{route('klien.update', $data->id_klien)}}">
                @csrf
                <div class="form-group row">
                    <label for="nama_klien" class="col-sm-3 col-form-label">Nama Klien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_klien" name="nama_klien" placeholder="Masukkan Nama" value="{{ $data->nama_klien }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" value="{{ $data->telepon }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ $data->alamat }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="industri" class="col-sm-3 col-form-label">Industri</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="industri" name="industri" placeholder="Masukkan Industri Klien" value="{{ $data->industri }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <button class="btn btn-light">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop