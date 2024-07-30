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
            <h2 class="section-title">Ubah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" value="{{ old('username', $user->username) }}">
                    <small id="idHelp" class="form-text text-muted"></small>
                    @error('username')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control" name="level" id="level">
                        @foreach(['Admin', 'Customer'] as $levelOption)
                        <option value="{{ $levelOption }}" @if(old('level', $user->level) == $levelOption) selected @endif>
                            {{ $levelOption }}
                        </option>
                        @endforeach
                    </select>
                    @error('level')
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