@extends('user.partials.master')

@section('content')
    <!-- partial -->
    <div class="container" style="width: 100%; height:100%;">
        <div class="main-panel">
            <div class="content-wrapper" style="margin-top: 170px;">
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
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Tambah Data
                        </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Peminjaman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.post') }}" method="post">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Nama Pengirim</b></label>
                                                        <input type="text" name="nama" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Alamat Pengirim</b></label>
                                                        <input type="text" name="alamat" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Nomor HP Pengirim</b></label>
                                                        <input type="text" name="no_hp" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Nama Penerima</b></label>
                                                        <input type="text" name="nama_penerima" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Alamat Penerima</b></label>
                                                        <input type="text" name="alamat_penerima" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Nomor HP Penerima</b></label>
                                                        <input type="text" name="nohp_penerima" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color: #0f0f10;">Tanggal Dikirim</b></label>
                                                        <input type="date" name="tanggal_dikirim" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color:#0f0f10;">Nama Barang</b></label>
                                                        <input type="text" name="nama_barang" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for=""><b style="color:#0f0f10;">Jumlah Barang</b></label>
                                                        <input type="text" name="jumlah" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-dark">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                                                        @elseif ($item->status == 'dikirim')
                                                            <span class="badge badge-success">{{ $item->status }}</span>
                                                        @else
                                                            {{ $item->status }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item->status == 'proses')
                                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="ti-trash" style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i>
                                                            </button>
                                                        </form>
                                                    @endif
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
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('sweetalert::alert')
@endsection
