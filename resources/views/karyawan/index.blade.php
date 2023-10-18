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
    <title>Bootstrap demo</title>
    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
    @endsection
</head>

<body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section('content')
    <a href="{{ route('karyawan.create') }}" type="button" class="btn btn-success">Tambah +</a>
    <div class="table-responsive">
        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
            <thead>
                <!-- start row -->
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
                <!-- end row -->
            </thead>
            <tbody>
                @foreach ($data as $key => $row)
                    <!-- start row -->
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->nama }} </td>
                        <td>{{ $row->jenis_kelamin }} </td>
                        <td>{{ $row->no_telepon }} </td>
                        <td>{{ $row->alamat }} </td>

                        <td>
                            <div class="d-flex">
                                {{-- <a href="{{route( 'pegawai.destroy',$row->id) }}"class="btn btn-danger">Delete</a> --}}
                                <a href=" {{ route('karyawan.edit', $row->id) }}" class="btn btn-primary mr-1">Edit</a>
                                <form action="{{ route('karyawan.destroy', $row->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-outline-danger delete-btn" style="margin-left: 10px;"
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
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            let id = $(this).data('id');
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
