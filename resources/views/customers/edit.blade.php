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
                        <form action="{{ route('customers.update', $customers->customer_id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="number" name="customer_id" class="form-control" id="exampleInputEmail1" placeholder="Enter ID" value="{{ old('customer_id', $customers->customer_id) }}"readonly>
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('customer_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input type="number" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Enter NIK"  value="{{ old('nik', $customers->nik) }}">
                                <small id="idHelp" class="form-text text-muted">NIK Sesuai KTP</small>
                                @error('nik')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="nama_customer" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" value="{{ old('nama_customer', $customers->nama_customer) }}">
                                <small id="emailHelp" class="form-text text-muted">Nama Sesuai Harus KTP</small>
                                @error('nama_customer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email', $customers->email) }}">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              @error('email')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Negara</label>
                                <input type="text" name="negara" class="form-control" id="exampleInputEmail1" placeholder="Negara" value="{{ old('negara', $customers->negara) }}">
                                @error('negara')
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