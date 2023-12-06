@extends('sidebar')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Proyek</h4>
                <form class="forms-sample" method="post" action="{{route('proyek.store')}}">
                @csrf
                <div class="form-group row">
                    <label for="id_proyek" class="col-sm-3 col-form-label">ID proyek</label>
                    <div class="col-sm-9 text-dark">
                        <input type="number" class="form-control text-dark" id="id_proyek" name="id_proyek" placeholder="Masukkan ID">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_proyek" class="col-sm-3 col-form-label">Nama proyek</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan lokasi proyek">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="durasi" name="durasi" placeholder="Masukkan Durasi Proyek">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggaran" class="col-sm-3 col-form-label">Anggaran</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="anggaran" name="anggaran" placeholder="Masukkan Anggaran Proyek">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manager" class="col-sm-3 col-form-label">Manager</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="id_manager" id="id_manager">
                            @foreach ($managers as $manager)
                            <option value="{{$manager->id_manager}}">{{$manager->id_manager}} - {{$manager->nama_manager}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vendor" class="col-sm-3 col-form-label">Vendor</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="id_vendor" id="id_vendor">
                            @foreach ($vendors as $vendor)
                            <option value="{{$vendor->id_vendor}}">{{$vendor->id_vendor}} - {{$vendor->nama_vendor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="klien" class="col-sm-3 col-form-label">Klien</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="id_klien" id="id_klien">
                            @foreach ($kliens as $klien)
                            <option value="{{$klien->id_klien}}">{{$klien->id_klien}} - {{$klien->nama_klien}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{route('proyek.index')}}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop