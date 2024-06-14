@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Edit Data Petugas</h4>
                            <form action="{{ route('petugas.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <a type="button" href="{{ route('petugas.index') }}" class="btn btn-primary">Kembali</a>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for=""><b>Nama</b></label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Alamat</b></label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Umur</b></label>
                                    <input type="text" name="umur" class="form-control" value="{{ $data->umur }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Nomor HP</b></label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp"
                                        value="{{ $data->no_hp }}">
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
        <script>
            // Fungsi untuk menambahkan strip setiap 4 karakter pada kolom input nomor HP
            document.getElementById('no_hp').addEventListener('input', function (e) {
                var target = e.target;
                var value = target.value.replace(/\D/g, ''); // Hapus semua karakter selain angka
                var formattedValue = '';
                var length = value.length;
                
                // Iterasi melalui nilai nomor HP
                for (var i = 0; i < length; i++) {
                    // Tambahkan strip setiap 4 karakter
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += '-';
                    }
                    formattedValue += value.charAt(i);
                }
                target.value = formattedValue;
            });
        </script>
@endsection
