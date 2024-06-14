@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Edit Data Pengiriman</h4>
                            <form action="{{ route('pengiriman.update', $pengiriman->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <a type="button" href="{{ route('pengiriman.index') }}" class="btn btn-primary">Kembali</a>
                                <br><br>

                                <div class="form-group">
                                    <label for=""><b>Nama Pengirim</b></label>
                                    <input type="text" name="nama_pengirim" class="form-control"
                                        value="{{ $pengiriman->pengirim->nama }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Nama Penerima</b></label>
                                    <input type="text" name="nama_penerima" class="form-control"
                                        value="{{ $pengiriman->nama_penerima }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Tanggal Dikirim</b></label>
                                    <input type="date" name="tanggal_dikirim" class="form-control"
                                        value="{{ $pengiriman->tanggal_dikirim }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Harga</b></label>
                                    <input type="text" name="harga" placeholder="Rp" class="form-control" value="{{ $pengiriman->harga }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Petugas</b></label>
                                    <select class="form-control" name="id_petugas">
                                        @foreach ($petugas as $p)
                                            <option value="{{ $p->id }}"
                                                {{ $pengiriman->id_petugas == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Kendaraan</b></label>
                                    <select class="form-control" name="id_kendaraan">
                                        @foreach ($kendaraan as $k)
                                            <option value="{{ $k->id }}"
                                                {{ $pengiriman->id_kendaraan == $k->id ? 'selected' : '' }}>
                                                {{ $k->merk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Status</b></label>
                                    <select class="form-control" name="status">
                                        <option value="proses" {{ $pengiriman->status == 'proses' ? 'selected' : '' }}>
                                            Proses</option>
                                        <option value="diterima" {{ $pengiriman->status == 'diterima' ? 'selected' : '' }}>
                                            Diterima</option>
                                        <option value="dikirim" {{ $pengiriman->status == 'dikirim' ? 'selected' : '' }}>
                                            Dikirim</option>
                                    </select>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
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
