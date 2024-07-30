@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Harga Hari Ini</h1>
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
            <form action="{{ route('admin.hargahariini.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Kamar</label>
                    <select class="form-control" name="id_kamar" id="exampleFormControlSelect1">
                        @foreach ($kamar as $dt_kamar)
                        <option value="{{ $dt_kamar->id_kamar }}">{{ $dt_kamar->nama_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Available Room</label>
                    <input type="number" name="available_room" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter available room">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    @error('available_room')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    @error('tanggal')
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