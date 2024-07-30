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
            <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Customer</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Metode Pembayaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pembayaran as $index => $pembayaran)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$pembayaran->nama_customer}}</td>
                        <td>{{$pembayaran->tanggal}}</td>
                        <td>{{$pembayaran->status}}</td>
                        <td>{{$pembayaran->metode_bayar}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.pembayaran.destroy', $pembayaran->id_payment) }}" method="POST">
                                <a href="{{ route('admin.pembayaran.show', $pembayaran->id_payment)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.pembayaran.edit', $pembayaran->id_payment) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
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