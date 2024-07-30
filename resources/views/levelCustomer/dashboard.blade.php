@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('customer/pembayaran')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        {{$countPembayaran}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('customer/reservasi')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-landmark"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Reservasi</h4>
                    </div>
                    <div class="card-body">
                        {{$countReservasi}}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection