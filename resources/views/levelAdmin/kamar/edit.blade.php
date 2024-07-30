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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kamar.update', $kamar->id_kamar) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kamar</label>
                    <input type="text" name="nama_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('nama_kamar', $kamar->nama_kamar) }}">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('nama_kamar')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level" class="form-label">Jenis Kamar</label>
                    <select class="form-control" name="jenis_kamar">
                        @foreach(['Deluxe', 'Superior', 'President'] as $jenisKamar)
                        <option value="{{ $jenisKamar }}" @if(old('jenis_kamar', $kamar->jenis_kamar) == $jenisKamar) selected @endif>
                            {{ $jenisKamar }}
                        </option>
                        @endforeach
                    </select>
                    @error('level')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ukuran Kamar</label>
                    <input type="number" name="ukuran_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('ukuran_kamar', $kamar->ukuran_kamar) }}">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    @error('ukuran_kamar')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" name="harga" class="form-control" id="exampleInputEmail1" value="{{ old('harga', $kamar->harga) }}">
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