@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/user')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('users')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/customers')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-id-badge"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Customers</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('customers')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/hargahariini')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                    <i class="fas fa-bed"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kamar</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('kamar')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/hargahariini')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Harga Hari Ini</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('hargahariini')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/invoice')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Invoice</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('invoice')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/pembayaran')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('pembayaran')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{url('admin/reservasi')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-landmark"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Reservasi</h4>
                    </div>
                    <div class="card-body">
                        {{DB::table('reservasi')->count()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection