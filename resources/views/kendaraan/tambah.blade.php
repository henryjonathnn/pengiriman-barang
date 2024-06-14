@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Tambah Data Kendaraan</h4>
                            <form action="{{ route('kendaraan.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <a type="button" href="{{ route('kendaraan.index') }}" class="btn btn-primary">Kembali</a>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for=""><b>Merk</b></label>
                                    <input type="text" name="merk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Nomor Plat</b></label>
                                    <input type="text" name="no_plat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Warna</b></label>
                                    <input type="text" name="warna" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Foto</b></label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
