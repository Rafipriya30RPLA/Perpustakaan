@extends('nav-side')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    @include('swal')
@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Daftar List Buku</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <a href="{{ route('penulis.create') }}" type="button" class="btn btn-success mb-3">Tambah +</a>
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Buku</th>
                                            <th scope="col">Kode Buku</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Nama Penulis</th>
                                            <th scope="col">Nama Penerbit</th>
                                            <th scope="col">Tanggal Dibuat</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($datatambahbuku) == 0)
                                        <tr>
                                            <td colspan="10" class="text-center data-empty">Data Kosong</td>
                                        </tr>
                                        @else
                                        @foreach ($datatambahbuku as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->nama_buku }} </td>
                                            <td>{{ $row->kode_buku }} </td>
                                            <td>{{ $row->stok }} </td>
                                            <td>{{ $row->penulis->nama_penulis }} </td>
                                            <td>{{ $row->penulis->penerbit->nama_penerbit }} </td>
                                            <td>{{Carbon\Carbon::parse($row->tanggal_terbit)->translatedFormat('d F Y') }} </td>
                                            <td class="description-cell">{{ $row->deskripsi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $row->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="..."></svg>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('tambahbuku.edit', $row->id)}}" class="btn btn-outline-primary mr-1">Edit</a>
                                                    <form action="{{route('tambahbuku.destroy', $row->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-outline-danger delete-btn" style="margin-left: 10px;" data-id="{{ $row->id }}">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    </script>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var descriptionCells = document.querySelectorAll('.description-cell');
            for (var i = 0; i < descriptionCells.length; i++) {
                var description = descriptionCells[i].textContent;
                if (description.length > 10) {
                    var truncatedDescription = description.substring(0, 10) + '...';
                    descriptionCells[i].textContent = truncatedDescription;
                }
            }
        });
    </script>
</body>
</html>
