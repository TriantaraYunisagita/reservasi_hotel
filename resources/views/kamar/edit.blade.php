<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pengguna</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Kamar</label>
                                <input type="number" name="id_kamar" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" value="{{ old('id_kamar', $kamar->id_kamar) }}"readonly>
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('id_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter Nama Kamar"  value="{{ old('nama_kamar', $kamar->nama_kamar) }}">
                                <small id="idHelp" class="form-text text-muted">NIK Sesuai KTP</small>
                                @error('nama_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                            @method('PUT')
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Jenis Kamar</label>
                                <select class="form-select" name="jenis_kamar" >
                                    <option value="{{old('jenis_kamar', $kamar->jenis_kamar)}}">{{old('jenis_kamar', $kamar->jenis_kamar)}}</option>
                                    <option value="Deluxe">Deluxe</option>
                                <option value="Superior">Superior</option>
                                <option value="President">President</option>
                                </select>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Ukuran Kamar</label>
                              <input type="number" name="ukuran_kamar" class="form-control" id="exampleInputEmail1" placeholder="Enter Ukuran Kamar" value="{{ old('ukuran_kamar', $kamar->ukuran_kamar) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('ukuran_kamar')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga" value="{{ old('harga', $kamar->harga) }}">
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
           
                        
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>