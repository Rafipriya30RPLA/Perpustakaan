<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<body>
    <h3 class="text-center mb-5">Edit Data Penerbit</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
        <div class="card">
            <div class="card-body">

                    <form action="{{route('penerbit.update',$data->id) }}"method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" class="form-control @error('nama_penerbit')is-invalid
                            @enderror" id=""value="{{$data->nama_penerbit}}">
                          </div>
                          @error('nama_penerbit')

                          @enderror

                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">No Telepon</label>
                            <input type="number" name="no_telepon" class="form-control @error('no_telepon')is-invalid
                            @enderror" id=""value="{{$data->no_telepon}}">
                          </div>
                          @error('no_telepon')

                          @enderror
                          <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat')is-invalid
                            @enderror" id=""value="{{$data->alamat}}">
                          </div>
                          @error('alamat')

                          @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('penerbit.index')}}" type="button" class="btn btn-seccondary">Kembali</a>
                      </form>
                </div>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
