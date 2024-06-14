@extends('partials.master')

@section('content')
    <br>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($data as $item)
                            <h4 class="card-title">Profil {{$item->name}}</h4>
                            <form action="{{ route('petugas.post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <div class="form-group">
                                    <label for=""><b>Nama</b></label>
                                    <input type="text" name="nama" value="{{ $item->name }}" class="form-control"
                                    readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Email</b></label>
                                    <input type="text" name="email" value="{{ $item->email }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Akun dibuat pada</b></label>
                                    <input type="text" name="created_at" value="{{ $item->created_at }}" class="form-control" readonly>
                                </div>
                                <div class="d-flex justify-content-end"> <!-- Tambahkan kelas ini untuk mengatur posisi tombol "Kembali" ke kanan -->
                                    <a type="button" href="{{ route('petugas') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                <br>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
