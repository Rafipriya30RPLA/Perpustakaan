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
  <title>Karyawan</title>
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
              <p class="card-title">Daftar Karyawan</p>
              <div class="row">

                <div class="col-12">
                  <div class="table-responsive">
                    <a href="{{ route('karyawan.create') }}" type="button" class="btn btn-success mb-3">Tambah +</a>
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($data) == 0)
                        <tr>
                          <td colspan="6" class="text-center data-empty">Data Kosong</td>
                        </tr>
                      @else
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
                                <a href=" {{ route('karyawan.edit', $row->id) }}" class="btn btn-outline-primary" mr-1">Edit</a>
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
                        @endif
                        <!-- end row -->

                      </tbody>
                  </table>
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
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/chart.js/Chart.min.js"></script>
        {{-- <script src="vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> --}}
        <script src="js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
</body>

</html>
