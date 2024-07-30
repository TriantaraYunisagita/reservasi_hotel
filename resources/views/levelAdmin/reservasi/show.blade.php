@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Reservasi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$reservasi->nama_customer}}</h2>
        </div>
        <div class="card-body">
            <p>ID Reservasi: {{$reservasi->id_reservasi}}</p>
            <p>Tanggal: {{$reservasi->tanggal}}</p>
            <p>Tanggal Mulai: {{$reservasi->tanggal_mulai}}</p>
            <p>Tanggal Akhir: {{$reservasi->tanggal_akhir}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.reservasi.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('admin.reservasi.edit', $reservasi->id_reservasi) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection