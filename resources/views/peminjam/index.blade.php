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
            <div class="col-10 ">
                <div class="card">
                    <div class="card-body">

                        <button type="button" data-bs-toggle="modal" data-bs-target="#modaltambah"
                            class="btn btn-success">Tambah
                            +</button>
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
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#raffi{{ $row->id }}"
                                                        class="btn btn-outline-primary mr-1">Edit</button>
                                                    <form action="{{ route('peminjam.destroy', $row->id) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-outline-danger delete-btn"
                                                            style="margin-left: 10px;"
                                                            data-id="{{ $row->id }}">Hapus</button>
                                                    </form>
                                    @endforeach
                        </div>
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
{{-- Modal Tambah --}}
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('peminjam.store') }}"method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}"
                            class="form-control @error('nama_peminjam')is-invalid
                    @enderror"
                            id="">
                    </div>
                    @error('nama_peminjam')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ $message }}',
                            })
                        </script>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Nama Buku</label>
                        <input type="text" name="nama_buku" value="{{ old('nama_buku') }}"
                            class="form-control @error('nama_buku')is-invalid
              @enderror"
                            id="">
                    </div>
                    @error('nama_buku')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ $message }}',
                            })
                        </script>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Kode Buku</label>
                        <input type="number" name="kode_buku"
                            value="{{ old('kode_buku') }}"class="form-control @error('kode_buku')is-invalid
              @enderror"
                            id="">
                    </div>
                    @error('kode_buku')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ $message }}',
                            })
                        </script>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam"
                            value="{{ old('tanggal_pinjam') }}"class="form-control @error('tanggal_pinjam')is-invalid
              @enderror"
                            id="">
                    </div>
                    @error('tanggal_pinjam')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ $message }}',
                            })
                        </script>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Tenggat</label>
                        <input type="date" name="tenggat"
                            value="{{ old('tenggat') }}"class="form-control @error('tenggat')is-invalid
            @enderror"
                            id="">
                    </div>
                    @error('tenggat')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '{{ $message }}',
                            })
                        </script>
                    @enderror

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
@foreach ($data as $key => $row)
    <form action="{{ route('peminjam.update', $row->id) }}"method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal fade" id="raffi{{ $row->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam"
                                class="form-control @error('nama_peminjam')is-invalid
        @enderror"
                                id=""value="{{ $row->nama_peminjam }}">
                        </div>
                        @error('nama_peminjam')
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Buku</label>
                            <input type="text" name="nama_buku"
                                class="form-control @error('nama_buku')is-invalid
        @enderror"
                                id=""value="{{ $row->nama_buku }}">
                        </div>
                        @error('nama_buku')
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Kode Buku</label>
                            <input type="number" name="kode_buku"
                                class="form-control @error('kode_buku')is-invalid
        @enderror"
                                id=""value="{{ $row->kode_buku }}">
                        </div>
                        @error('kode_buku')
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam"
                                class="form-control @error('tanggal_pinjam')is-invalid
        @enderror"
                                id=""value="{{ $row->tanggal_pinjam }}">
                        </div>
                        @error('tanggal_pinjam')
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Tenggat</label>
                            <input type="date" name="tenggat"
                                class="form-control @error('tenggat')is-invalid
        @enderror"
                                id=""value="{{ $row->tenggat }}">
                        </div>
                        @error('tenggat')
                        @enderror

                    </div>
                </div>
                < <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </div>
        </div>
    </form>
@endforeach
</body>
