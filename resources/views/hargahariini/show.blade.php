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
        <h3 class="d-flex justify-content-center">Show Customers</h1>
        <div class="container mt-3">        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID Hotel</th>
                <th>Harga</th>
                <th>Available Room</th>
                <th>Tanggal</th>
                <th>ID Kamar</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{$hargahariini->id_hotel}}</td>
                <td>{{$hargahariini->harga}}</td>
                <td>{{$hargahariini->available_room}}</td>
                <td>{{$hargahariini->tanggal}}</td>
                <td>{{$hargahariini->id_kamar}}</td>
            </tr>
            </tbody>
        </table>

        <div>
            <a href="{{ route('hargahariini.index') }}" class="btn btn-primary">Kembali</a>
        </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>