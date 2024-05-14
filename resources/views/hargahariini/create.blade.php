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
                    <h3 class="text-center my-4">Data Harga Hari Ini</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('hargahariini.store') }}" method="POST"  >
                          @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">ID Hotel</label>
                            <input type="number" name="id_hotel" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter ID">
                            <small id="idHelp" class="form-text text-muted"></small>
                            @error('id_hotel')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter Harga">
                            <small id="idHelp" class="form-text text-muted"></small>
                            @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Available Room</label>
                                <input type="number" name="available_room" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Avaliable Room">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('available_room')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal</label>
                              <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tanggal">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tanggal')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Kamar</label>
                                <input type="number" name="id_kamar" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter ID">
                                <small id="idHelp" class="form-text text-muted"></small>
                                @error('id_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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