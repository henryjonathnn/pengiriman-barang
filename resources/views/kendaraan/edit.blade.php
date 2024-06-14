@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Edit Data Kendaraan</h4>
                            <form action="{{ route('kendaraan.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <a type="button" href="{{ route('kendaraan.index') }}" class="btn btn-primary">Kembali</a>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for=""><b>Merk</b></label>
                                    <input type="text" name="merk" class="form-control" value="{{ $data->merk }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Nomor Plat</b></label>
                                    <input type="text" name="no_plat" class="form-control" value="{{ $data->no_plat }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Warna</b></label>
                                    <input type="text" name="warna" class="form-control" value="{{ $data->warna }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Foto</b></label>
                                    <br>
                                    <img src="{{ asset($data->foto) }}" width="100px" height="100px"
                                        style="border-radius: 0%; width: 70px; height:80px"></label>
                                    <br>
                                    <br>
                                    <input type="file" name="foto" value="{{ $data->foto }}" class="form-control">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
