@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Kamar</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">Tambah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kamar.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kamar</label>
                    <input type="text" name="nama_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter bedroom name">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('nama_kamar')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd" class="form-label">Jenis Kamar</label>
                    <select class="form-control" name="jenis_kamar">
                        <option value="Deluxe">Deluxe</option>
                        <option value="Superior">Superior</option>
                        <option value="President">President</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ukuran Kamar</label>
                    <input type="number" name="ukuran_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter bedroom size">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    @error('ukuran_kamar')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga">
                    @error('negara')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection