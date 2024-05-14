<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="d-flex justify-content-center">Data Customers</h1>
        
        <div class="d-flex justify-content-start">
        <a href="{{ route('kamar.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
        </div>

        <div class="container mt-3">        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID Kamar</th>
                <th>Nama Kamar</th>
                <th>Jenis Kamar</th>
                <th>Ukuran Kamar</th>
                <th>Harga</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($kamar as $index => $kamar)
            <tr>
                <td>{{$kamar->id_kamar}}</td>
                <td>{{$kamar->nama_kamar}}</td>
                <td>{{$kamar->jenis_kamar}}</td>
                <td>{{$kamar->ukuran_kamar}}</td>
                <td>{{$kamar->harga}}</td>
                <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kamar.destroy', $kamar->id_kamar) }}" method="POST">
                    <a href="{{ route('kamar.show', $kamar->id_kamar)}}" class="btn btn-primary">Show</a>
                    <a href="{{ route('kamar.edit', $kamar->id_kamar) }}" class="btn btn-info">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
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
        {{-- {{ $user->links() }} --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>