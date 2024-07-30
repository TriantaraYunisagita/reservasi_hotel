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
            <h2 class="section-title">{{$invoice->tanggal_mulai}}/{{$invoice->tanggal_akhir}}</h2>
        </div>
        <div class="card-body">
            <p>ID Invoice: {{$invoice->id_invoice}}</p>
            <p>Deskripsi: {{$invoice->deskripsi}}</p>
            <p>Status: {{$invoice->status}}</p>
            <p>Besar Dp: {{$invoice->besar_dp}}</p>
        </div>
        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('admin.invoice.index')}}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('admin.invoice.edit', $invoice->id_invoice) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection