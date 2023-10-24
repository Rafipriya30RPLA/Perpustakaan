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
<title>Pengembalian</title>

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection
<link rel="stylesheet" href="vendors/feather/feather.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
</head>


<body>
@include('swal')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Daftar Pengembalian</p>
                    <div class="row">

                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
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
                                        </thead>
                                    <tbody>
                                        @if (count($datapeminjam) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center data-empty">Data Kosong</td>
                                            </tr>
                                        @else
                                            @foreach ($datapeminjam as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->nama_peminjam }} </td>
                                                    <td>{{ $row->tambahbuku->nama_buku }} </td>
                                                    <td>{{ $row->kode_buku }} </td>
                                                    <td>{{ Carbon\Carbon::parse($row->tanggal_pinjam)->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($row->tenggat)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">
                                                            {{-- <form action="{{ route('peminjam.update', $row->id) }}"method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('POST')
                                              <button type="submit"
                                                  class="btn btn-outline-success mr-1">Setujui</button>
                                              </form> --}}
                                                            <form action="{{ route('pengembalian.destroy', $row->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button"
                                                                    class="btn btn-outline-success delete-btn"
                                                                    style="margin-left: 10px;"
                                                                    data-id="{{ $row->id }}">Kembalikan</button>
                                                            </form>
                                            @endforeach
                                        @endif
                                        <!-- end row -->

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
                    text: 'Apakah Anda Yakin Ingin Mengembalikan Buku Ini?',
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengembalian</h1>
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
                            <select name="id_tambahbuku" id="" class="form-select">
                                <option value=""disabled selected>Pilih Nama Buku</option>
                                @foreach ($datatambahbuku as $tambahbuku)
                                    <option value="{{ $tambahbuku->id }}">{{ $tambahbuku->nama_buku }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_tambahbuku')
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
    @foreach ($datapeminjam as $key => $row)
        <div class="modal fade" id="raffi{{ $row->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    @endforeach
</body>
