@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data User</h1>
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
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter username">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('username')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter email">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputpassword1" aria-describedby="idHelp" placeholder="Enter password">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd" class="form-label">Level</label>
                    <select class="form-control" name="level">
                        <option value="Customer">Customer</option>
                        <option value="Admin">Admin</option>
                    </select>
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