@extends('nav-side')
@section('sidebar')
@endsection
@section('header')
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modaltambah" class="btn btn-success">Tambah +</button>
                            <div class="row" style="padding-top:10px;">
                                <table class="table">
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Penulis</th>
                                            <th scope="col">Nama Penerbit</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $row)
                                            <!-- start row -->
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->nama_penulis }} </td>
                                                <td>{{ $row->nama_penerbit }} </td>

                                                <td>
                                                    <div class="d-flex">
                                                        {{-- <a href="{{route( 'pegawai.destroy',$row->id) }}"class="btn btn-danger">Delete</a> --}}
                                                        {{-- <a href=" {{ route('penulis.edit', $row->id) }}"
                                                            class="btn btn-outline-primary mr-1">Edit</a> --}}
                                                            <button type="button" data-bs-toggle="modal"
                                                             data-bs-target="#raffi{{ $row->id }}" class="btn btn-outline-primary mr-1">Edit</button>
                                                        <form action="{{ route('penulis.destroy', $row->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="button" class="btn btn-outline-danger delete-btn"
                                                                style="margin-left: 10px;"
                                                                data-id="{{ $row->id }}">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- end row -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin Ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form for deletion
                        $(this).closest('form').submit();
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

  <!-- Modal Edit -->
  @foreach ($data as $key => $row)
  <form action="{{ route('penulis.update', $row->id) }}"method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
  <div class="modal fade" id="raffi{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Penulis</label>
                    <input type="text" name="nama_penulis"
                        class="form-control @error('nama_penulis')is-invalid @enderror"
                        id=""value="{{ $row->nama_penulis }}">
                </div>
                @error('nama_penulis')
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Nama Penerbit</label>
                    <input type="text" name="nama_penerbit"
                        class="form-control @error('nama_penerbit')is-invalid @enderror"
                        id=""value="{{ $row->nama_penerbit }}">
                    </div>
                @error('nama_penerbit')
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</div>
</div>
</form>
 @endforeach
{{-- Modal Tambah --}}
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{route('penulis.store')}}"method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Nama Penulis</label>
                    <input type="text" name="nama_penulis" value="{{old('nama_penulis')}}" class="form-control @error('nama_penulis')is-invalid
                    @enderror" id="">
                </div>
                @error('nama_penulis')
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{$message}}',
                    })
                    </script>
                  @enderror

                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Nama Penerbit</label>
                    <input type="text" name="nama_penerbit" value="{{old('nama_penerbit')}}" class="form-control @error('nama_penerbit')is-invalid
                    @enderror" id="">
                </div>
                @error('nama_penerbit')
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{$message}}',
                    })
                    </script>
                  @enderror


        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
