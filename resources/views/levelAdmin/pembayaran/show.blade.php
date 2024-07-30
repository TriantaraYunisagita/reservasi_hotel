@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Pembayaran</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h2 class="section-title">{{$pembayaran->nama_customer}}</h2>
        </div>
        <div class="card-body">
            <p>ID Payment: {{$pembayaran->id_payment}}</p>
            <p>Tanggal: {{$pembayaran->tanggal}}</p>
            <p>Status: {{$pembayaran->status}}</p>
            <p>Metode Pembayaran: {{$pembayaran->metode_bayar}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.pembayaran.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('admin.pembayaran.edit', $pembayaran->id_payment) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection