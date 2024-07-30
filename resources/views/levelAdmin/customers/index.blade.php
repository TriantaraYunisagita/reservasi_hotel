@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Data Customers</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.customers.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Negara</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($customers as $index => $customers)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{$customers->nik}}</td>
                        <td>{{$customers->nama_customer}}</td>
                        <td>{{$customers->email}}</td>
                        <td>{{$customers->negara}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.customers.destroy', $customers->nik) }}" method="POST">
                                <a href="{{ route('admin.customers.show', $customers->nik)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.customers.edit', $customers->nik) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
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