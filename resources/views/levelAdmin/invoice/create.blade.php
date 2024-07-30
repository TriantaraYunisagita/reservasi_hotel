@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Invoice</h1>
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
            <form action="{{ route('admin.invoice.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tanggal Mulai</label>
                    <select class="form-control" name="id_reservasi" id="exampleFormControlSelect1">
                        @foreach ($reservasi as $dt_reservasi)
                        <option value="{{ $dt_reservasi->id_reservasi }}">{{ $dt_reservasi->tanggal_mulai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea rows="3" name="deskripsi" class="form-control" id="exampleInputtanggal_mulai1" ></textarea>
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="Bayar">Bayar</option>
                        <option value="Dp">Dp</option>
                        <option value="Lunas">Lunas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Besar Dp</label>
                    <input type="number" name="besar_dp" class="form-control" id="exampleInputbesar_dp1" aria-describedby="idHelp">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('besar_dp')
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