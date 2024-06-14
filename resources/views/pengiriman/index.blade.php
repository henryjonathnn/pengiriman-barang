@extends('partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h2 class="text-center">Data Pengiriman</h2>
                            @php
                                $no = 1;
                            @endphp
                            <br>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengirim</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Dikirim</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->pengirim->nama }}</td>
                                                <td>{{ $item->nama_penerima }}</td>
                                                <td>{{ $item->tanggal_dikirim }}</td>
                                                <td>
                                                    @if ($item->status == 'proses')
                                                        <span class="badge badge-primary">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'diterima')
                                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'dikirim')
                                                        <span class="badge badge-info">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'terkirim')
                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @else
                                                        {{ $item->status }}
                                                    @endif
                                                </td>

                                                <td>
                                                    <a type="button" class="btn btn-warning btn-sm"
                                                        href="{{ route('pengiriman.edit', $item->id) }}">
                                                        <i class="ti-pencil-alt"
                                                            style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop_{{ $item->id }}"
                                                        data-id="{{ $item->id }}"><i class="ti-eye"
                                                            style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i></button>

                                                    <!-- Modal Detail -->
                                                    <div class="modal
                                                                fade"
                                                        id="staticBackdrop_{{ $item->id }}" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                        Detail
                                                                        Pengiriman {{ $item->pengirim->nama }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for=""><b>Nama Petugas</b></label>
                                                                        @if ($item->petugas)
                                                                            <input type="text" name="id_petugas"
                                                                                value="{{ $item->petugas->nama }}"
                                                                                class="form-control" readonly>
                                                                        @else
                                                                            <input type="text" name="nama_petugas"
                                                                                value="-" class="form-control"
                                                                                readonly>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Nama
                                                                                Pengirim</b></label>
                                                                        <input type="text" name="no_plat"
                                                                            value="{{ $item->pengirim->nama }}"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Alamat
                                                                                Pengirim</b></label>
                                                                        <input type="text" name="no_plat"
                                                                            value="{{ $item->pengirim->alamat }}"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Nama
                                                                                Penerima</b></label>
                                                                        <input type="text" name="no_plat"
                                                                            value="{{ $item->nama_penerima }}"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Nama
                                                                                Barang</b></label>
                                                                        <input type="text" name="no_plat"
                                                                            value="{{ $item->nama_barang }}"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Jumlah
                                                                                Barang</b></label>
                                                                        <input type="text" name="no_plat"
                                                                            value="{{ $item->jumlah }}"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Harga</b></label>
                                                                        @if ($item->harga)
                                                                            <input type="text" name="warna"
                                                                                value="{{ $item->harga }}"
                                                                                class="form-control" readonly>
                                                                        @else
                                                                            <input type="text" name="warna"
                                                                                value="Belum Dipilih" style="color:red;"
                                                                                class="form-control" readonly>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Kendaraan</b></label>
                                                                        @if ($item->kendaraan)
                                                                            <input type="text" name="warna"
                                                                                value="{{ $item->kendaraan->merk }}"
                                                                                class="form-control" readonly>
                                                                        @else
                                                                            <input type="text" name="warna"
                                                                                value="Belum Dipilih" style="color:red;"
                                                                                class="form-control" readonly>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Plat</b></label>
                                                                        @if ($item->kendaraan)
                                                                            <input type="text" name="warna"
                                                                                value="{{ $item->kendaraan->no_plat }}"
                                                                                class="form-control" readonly>
                                                                        @else
                                                                            <input type="text" name="warna"
                                                                                value="Belum Dipilih" style="color:red;"
                                                                                class="form-control" readonly>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><b>Foto Bukti Penyerahan
                                                                            </b></label>
                                                                        <br>
                                                                        @if($item->foto_penyerahan)
                                                                        <img src="{{ asset($item->foto_penyerahan) }}"
                                                                            width="100px" height="100px"
                                                                            style="border-radius: 0%; width: 95px; height:85px; box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);">
                                                                            @else
                                                                            <input type="text" name="warna"
                                                                            value="Foto Belum Dipilih" style="color:red;"
                                                                                class="form-control" readonly>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-info btn-sm"
                                                        class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#penyerahan_{{ $item->id }}"
                                                        data-id="{{ $item->id }}"><i class="ti-camera"
                                                            style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i></button>

                                                    <!-- Modal Tambahkan Foto Penyerahan -->
                                                    <div class="modal
                                                    fade"
                                                        id="penyerahan_{{ $item->id }}" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                        Tambahkan Foto Penyerahan
                                                                        {{ $item->pengirim->nama }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <form
                                                                        action="{{ route('pengiriman.update-foto-penyerahan', $item->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for=""><b>Foto
                                                                                    Penyerahan</b></label>
                                                                            <input type="file" name="foto_penyerahan"
                                                                                class="form-control" required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
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
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('sweetalert::alert')
    @endsection
