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
            <h2 class="section-title">{{$kamar->nama_kamar}}</h2>
        </div>
        <div class="card-body">
            <p>ID: {{$kamar->id_kamar}}</p>
            <p>Jenis Kamar: {{$kamar->jenis_kamar}}</p>
            <p>Ukuran Kamar: {{$kamar->ukuran_kamar}} m2</p>
            <p>Harga: {{$kamar->harga}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.kamar.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('admin.kamar.edit', $kamar->id_kamar) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection