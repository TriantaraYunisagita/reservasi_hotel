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
            <a href="{{ route('admin.invoice.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 3%;">No.</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th style="width: 3%;">Deskripsi</th>
                        <th style="width: 3%;">Status</th>
                        <th style="width: 3%;">Besar Dp</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($invoice as $index => $invoice)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$invoice->tanggal_mulai}}</td>
                        <td>{{$invoice->tanggal_akhir}}</td>
                        <td>{{$invoice->deskripsi}}</td>
                        <td>{{$invoice->status}}</td>
                        <td>{{$invoice->besar_dp}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.invoice.destroy', $invoice->id_invoice) }}" method="POST">
                                <a href="{{ route('admin.invoice.show', $invoice->id_invoice)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.invoice.edit', $invoice->id_invoice) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
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