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
            <h2 class="section-title">{{$hargahariini->nama_kamar}}</h2>
        </div>
        <div class="card-body">
            <p>ID Hotel: {{$hargahariini->id_hotel}}</p>
            <p>ID Kamar: {{$hargahariini->id_kamar}}</p>
            <p>Harga: {{$hargahariini->harga}}</p>
            <p>Tanggal: {{$hargahariini->tanggal}}</p>
            <p>Available Room: {{$hargahariini->available_room}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.hargahariini.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('admin.hargahariini.edit', $hargahariini->id_hotel) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection