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
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">NIK</label>
          <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter NIK">
          <small id="idHelp" class="form-text text-muted"></small>
          @error('nik')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" name="nama_customer" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter name">
          <small id="idHelp" class="form-text text-muted"></small>
          @error('nama_customer')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
          <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <select class="form-control" name="customer_id" id="exampleFormControlSelect1">
              @foreach ($user as $dt_user)
              <option value="{{ $dt_user->id }}">{{ $dt_user->email }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Negara</label>
            <input type="text" name="negara" class="form-control" id="exampleInputEmail1" placeholder="Enter country">
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