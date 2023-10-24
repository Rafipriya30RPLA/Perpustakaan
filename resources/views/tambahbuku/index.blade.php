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
                                <a href="{{ route('tambahbuku.create') }}" type="button" class="btn btn-success mb-3">Tambah +</a>
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

                                                     <!-- Button trigger modal -->
                                                     <button type="button"class="btn btn-outline-secondary"
                                                     data-bs-toggle="modal" data-bs-target="#exampleModal{{ $row->id }}">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m20 22.09l2.45 1.49l-.65-2.81l2.2-1.88l-2.89-.25L20 16l-1.13 2.64l-2.87.25l2.18 1.88l-.68 2.81l2.5-1.49M14.08 21H2a2.074 2.074 0 0 1-2-2V5c.04-1.09.91-1.96 2-2h20c1.09.04 1.96.91 2 2v10.53c-.58-.53-1.25-.92-2-1.19V5H2v14h12.08c-.05.33-.08.66-.08 1c0 .34.03.68.08 1M14 17H4v-1.25c0-1.66 3.34-2.5 5-2.5c1.66 0 5 .84 5 2.5V17m0-6h4v1h-4v-1M9 7C7.63 7 6.5 8.13 6.5 9.5S7.63 12 9 12s2.5-1.13 2.5-2.5S10.37 7 9 7m5 2h6v1h-6V9m0-2h6v1h-6V7Z"/></svg>
                                                 </button>

                                                 <!-- Modal -->
                                                 <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                     Detail</h1>
                                                             </div>
                                                             <div class="modal-body">
                                                             <div class="mb-3">
                                                                <label for="" class="form-label">Nama Buku</label>
                                                                <br>
                                                                {{ $row->nama_buku }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                                                <br>
                                                                {{ $row->kode_buku }}
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="stok" class="form-label">Stok</label>
                                                                <br>
                                                                 {{ $row->stok }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_penulis" class="form-label">Nama Penulis</label>
                                                                <br>
                                                               {{ $row->penulis->nama_penulis }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                                                                <br>
                                                                {{ $row->penulis->penerbit->nama_penerbit }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal_buat" class="form-label">Tanggal Dibuat</label>
                                                                <br>
                                                                {{ Carbon\Carbon::parse($row->tanggal_terbit)->translatedFormat('d F Y') }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <br>
                                                                {{ $row->deskripsi }}"
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="foto" class="form-label">Foto</label>
                                                                <br>
                                                                <img src="{{ asset('storage/tambahbuku/' . $row->foto) }}" alt="" style="max-width: 100%; height: auto; border: 2px solid #3498db;  border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                         </div>
                                                        </div>
                                                     </div>
                                                 </div>

                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                    {{-- <a href="{{route( 'pegawai.destroy',$row->id) }}"class="btn btn-danger">Delete</a> --}}
                                                    <a href=" {{route('tambahbuku.edit', $row->id) }}"
                                                        class="btn btn-outline-primary mr-1">Edit</a>
                                                        <form action="{{ route('tambahbuku.destroy',$row->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="button"  class="btn btn-outline-danger delete-btn" style="margin-left: 10px;" data-id="{{ $row->id }}">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
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
        var descCells = document.querySelectorAll('.description-cell');
        for (var i = 0; i < descCells.length; i++) {
            var desc = descCells[i].textContent;
            if (desc.length > 10) {
                var truncatedDesc = desc.substring(0, 10) + '...';
                descCells[i].textContent = truncatedDesc;
            }
        }
    });
</script>


<style>
    .modal-dialog {
        max-width: 200px; /* Lebar maksimum modal */
    }

    .modal-content {
        border: 1px solid #ccc; /* Gaya border untuk modal */
    }

    .modal-body {
        text-align:10px; /* Pusatkan konten dalam modal */
    }
</style>



