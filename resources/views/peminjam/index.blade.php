
@extends('nav-side')
@section('sidebar')
@section('header')

@endsection
@endsection
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   @section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-10 " >
               <div class="card">
                   <div class="card-body">

                       <a href="{{ route('peminjam.create') }}" type="button" class="btn btn-success">Tambah +</a>
                       <div class="row" style="padding-top:10px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Peminjam</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tenggat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->nama_peminjam }} </td>
                                    <td>{{ $row->nama_buku }} </td>
                                    <td>{{ $row->kode_buku }} </td>
                                    <td>{{ $row->tanggal_pinjam }} </td>
                                    <td>{{ $row->tenggat }} </td>

                                    <td>
                                        <div class="d-flex">
                                            {{-- <a href="{{route( 'pegawai.destroy',$row->id) }}"class="btn btn-danger">Delete</a> --}}
                                            <a href=" {{route('peminjam.edit', $row->id) }}"
                                                class="btn btn-outline-primary mr-1">Edit</a>
                                                <form action="{{ route('peminjam.destroy',$row->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-outline-danger delete-btn" style="margin-left: 10px;" data-id="{{ $row->id }}">Hapus</button>
                                                </form>

                                                @endforeach  </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           @endsection
        <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
        <script>
                  $(document).ready(function () {
                      $('.delete-btn').click(function () {
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
