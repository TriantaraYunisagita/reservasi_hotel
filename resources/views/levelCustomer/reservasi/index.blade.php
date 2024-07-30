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
            <a href="{{ route('customer.reservasi.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Customer</th>
                        <th>Tanggal</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservasi as $index => $reservasi)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$reservasi->nama_customer}}</td>
                        <td>{{$reservasi->tanggal}}</td>
                        <td>{{$reservasi->tanggal_mulai}}</td>
                        <td>{{$reservasi->tanggal_akhir}}</td>
                        <td>
                            <a href="{{ route('customer.reservasi.show', $reservasi->id_reservasi)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data belum ada</strong>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection