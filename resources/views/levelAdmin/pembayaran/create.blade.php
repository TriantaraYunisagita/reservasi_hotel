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
            <h2 class="section-title">Tambah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pembayaran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Customer</label>
                    <select class="form-control" name="customer_id" id="exampleFormControlSelect1">
                        @foreach ($customers as $dt_customers)
                        <option value="{{ $dt_customers->customer_id }}">{{ $dt_customers->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="id_invoice" id="exampleFormControlSelect1">
                        @foreach ($invoice as $dt_invoice)
                        <option value="{{ $dt_invoice->id_invoice }}">{{ $dt_invoice->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd" class="form-label">Metode Pembayaran</label>
                    <select class="form-control" name="metode_bayar">
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
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