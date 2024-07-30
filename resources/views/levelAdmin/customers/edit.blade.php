@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Customers</h1>
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
            <form action="{{ route('admin.customers.update', $customers->nik) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('nik', $customers->nik) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama_customer" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('nama_customer', $customers->nama_customer) }}">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('nama_customer')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Negara</label>
                        <input type="text" name="negara" class="form-control" id="exampleInputEmail1" value="{{ old('negara', $customers->negara) }}">
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