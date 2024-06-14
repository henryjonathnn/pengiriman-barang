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
                            <h2 class="text-center">Data Kendaraan</h2>
                            <a type="button" href=" {{ route('kendaraan.create') }} " class="btn btn-primary btn-sm"><i
                                    class="ti-plus"></i></a>
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
                                            <th>Merk</th>
                                            <th>No Plat</th>
                                            <th>Warna</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td> {{ $no++ }} </td>
                                                <td> {{ $item->merk }} </td>
                                                <td> {{ $item->no_plat }} </td>
                                                <td> {{ $item->warna }} </td>
                                                <td>

                                                    <form action="{{ route('kendaraan.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop_{{ $item->id }}"
                                                            data-id="{{ $item->id }}"><i class="ti-eye"
                                                                style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal
                                                                fade"
                                                            id="staticBackdrop_{{ $item->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                                            Detail
                                                                            Kendaraan {{ $item->merk }}
                                                                            {{ $item->warna }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for=""><b>Merk</b></label>
                                                                            <input type="text" name="merk"
                                                                                value="{{ $item->merk }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><b>Nomor
                                                                                    Plat</b></label>
                                                                            <input type="text" name="no_plat"
                                                                                value="{{ $item->no_plat }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><b>Warna</b></label>
                                                                            <input type="text" name="warna"
                                                                                value="{{ $item->warna }}"
                                                                                class="form-control" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><b>Foto
                                                                                    {{ $item->merk }}
                                                                                    {{ $item->warna }}
                                                                                </b></label>
                                                                            <br>
                                                                            <img src="{{ asset($item->foto) }}"
                                                                                width="100px" height="100px"
                                                                                style="border-radius: 0%; width: 95px; height:85px; box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            </div>
                            <a type="button" class="btn btn-warning btn-sm"
                                href="{{ route('kendaraan.edit', $item->id) }}">
                                <i class="ti-pencil-alt"
                                    style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash"
                                    style="color: white; filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));"></i></button>
                            </form>
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
    <script>
        $(document).ready(function() {
            // Tangkap event ketika modal ditampilkan
            $('[id^="staticBackdrop_"]').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang membuka modal
                var id = button.data('id'); // Ambil ID dari tombol
                var modal = $(this);

                // AJAX untuk mendapatkan data berdasarkan ID
                $.ajax({
                    url: '/kendaraan/' + id,
                    type: 'GET',
                    success: function(response) {
                        // Isi modal dengan data yang diterima
                        modal.find('.modal-title').text('Detail Kendaraan ' + response.merk);
                        modal.find('.modal-body input[name="merk"]').val(response.merk);
                        modal.find('.modal-body input[name="no_plat"]').val(response.no_plat);
                        modal.find('.modal-body input[name="warna"]').val(response.warna);
                        modal.find('.modal-body img').attr('src', response.foto);
                    },
                    error: function(xhr) {
                        // Tangani kesalahan jika ada
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('sweetalert::alert')
@endsection
