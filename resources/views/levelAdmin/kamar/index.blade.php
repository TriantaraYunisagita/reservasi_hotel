@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Kamar</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.kamar.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kamar</th>
                        <th>Jenis Kamar</th>
                        <th>Ukuran Kamar</th>
                        <th>Harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kamar as $index => $kamar)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$kamar->nama_kamar}}</td>
                        <td>{{$kamar->jenis_kamar}}</td>
                        <td>{{$kamar->ukuran_kamar}}</td>
                        <td>{{$kamar->harga}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.kamar.destroy', $kamar->id_kamar) }}" method="POST">
                                <a href="{{ route('admin.kamar.show', $kamar->id_kamar)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.kamar.edit', $kamar->id_kamar) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
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