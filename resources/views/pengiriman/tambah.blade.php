@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Tambah Data Pengiriman</h4>
                            <form action="{{ route('pengiriman.store') }}" method="post">
                                @csrf
                                <a type="button" href="{{ route('pengiriman.index') }}" class="btn btn-primary">Kembali</a>
                                <br>
                                <br>
                                {{-- nama pengirim memiliki value kolom name dari migration user, lalu akan disimpan ke dalam kolom nama di tabel baru yaitu pengirim --}}
                                <div class="form-group">
                                    <label for=""><b>Nama Pengirim</b></label>
                                    <input type="text" name="nama" value="" class="form-control">
                                </div>
                                {{-- Alamat pengirim akan disimpan ke dalam tabel pengirim --}}
                                <div class="form-group">
                                    <label for=""><b>Alamat Pengirim</b></label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                                {{-- No hp pengirim akan disimpan ke dalam tabel pengirim --}}
                                <div class="form-group">
                                    <label for=""><b>No HP Pengirim</b></label>
                                    <input type="text" name="no_hp" id="no_hp" class="form-control">
                                </div>
                                {{-- nama penerima akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Nama Penerima</b></label>
                                    <input type="text" name="nama_penerima" class="form-control">
                                </div>
                                {{-- alamat penerima akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Alamat Penerima</b></label>
                                    <input type="text" name="alamat_penerima" class="form-control">
                                </div>
                                {{-- nomor hp penerima akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Nomor HP Penerima</b></label>
                                    <input type="text" name="nohp_penerima" class="form-control" id="no_hp2">
                                </div>
                                {{-- tanggal dikirim penerima akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Tanggal Dikirim</b></label>
                                    <input type="date" name="tanggal_dikirim" class="form-control">
                                </div>
                                {{-- nama barang akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Nama Barang</b></label>
                                    <input type="text" name="nama_barang" class="form-control">
                                </div>
                                {{-- berat barang akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Berat Barang (Kg)</b></label>
                                    <input type="text" name="berat_barang" class="form-control">
                                </div>
                                {{-- jumlah barang akan disimpan di dalam tabel pengiriman --}}
                                <div class="form-group">
                                    <label for=""><b>Jumlah Barang</b></label>
                                    <input type="text" name="jumlah" class="form-control">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // Fungsi untuk menambahkan strip setiap 4 karakter pada kolom input nomor HP
            document.getElementById('no_hp').addEventListener('input', function(e) {
                var target = e.target;
                var value = target.value.replace(/\D/g, '');
                var formattedValue = '';
                for (var i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += '-';
                    }
                    formattedValue += value.charAt(i);
                }
                target.value = formattedValue;
            });
            document.getElementById('no_hp2').addEventListener('input', function(e) {
                var target = e.target;
                var value = target.value.replace(/\D/g, '');
                var formattedValue = '';
                for (var i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += '-';
                    }
                    formattedValue += value.charAt(i);
                }
                target.value = formattedValue;
            });
        </script>
@endsection
