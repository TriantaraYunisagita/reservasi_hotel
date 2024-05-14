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
        <h3 class="d-flex justify-content-center">Show Kamar</h1>
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
            <tr>
                <td>{{$kamar->id_kamar}}</td>
                <td>{{$kamar->nama_kamar}}</td>
                <td>{{$kamar->jenis_kamar}}</td>
                <td>{{$kamar->ukuran_kamar}}</td>
                <td>{{$kamar->harga}}</td>
            </tr>
            </tbody>
        </table>

        <div>
            <a href="{{ route('kamar.index') }}" class="btn btn-primary">Kembali</a>
        </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>