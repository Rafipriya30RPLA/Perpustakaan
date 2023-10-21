@extends('nav-side')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themewagon.github.io/skydash/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 07:02:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
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
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
     @section('header')
  @endsection
  @section('content')


      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name}} </h3>
          <h6 class="font-weight-normal mb-2">Selamat datang di Blue-book</h6>
        </div>
        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class=" flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-info  "
                aria-haspopup="true" aria-expanded="true">
                  <i class="mdi mdi-calendar"></i> <span id="currentDate"></span>
                </button>
              </div>
            </div>
          </div>
          </div>
          </div>
          <script>
            // Mengambil elemen dengan ID "currentDate"
            var currentDateElement = document.getElementById('currentDate');

            // Mendapatkan tanggal hari ini
            var currentDate = new Date();

            // Format tanggal sesuai kebutuhan (misalnya, "10 Jan 2021")
            var options = { year: 'numeric', month: 'short', day: 'numeric' };
            var formattedDate = currentDate.toLocaleDateString('en-US', options);

            // Mengisi elemen dengan tanggal hari ini
            currentDateElement.textContent = formattedDate;
          </script>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Total Stok Buku</p>
                        <p class="fs-30 mb-2">{{ app('App\Http\Controllers\DashboardController')->hitungStok() }}</p>
                        <p>Total Stok Buku Tersedia</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Buku Dipinjam</p>
                <p class="fs-30 mb-2">{{ app('App\Http\Controllers\DashboardController')->hitungPeminjam() }}</p>
                <p>Total Stok Buku Dipinjam</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Total Nama Buku</p>
                <p class="fs-30 mb-2">{{ app('App\Http\Controllers\DashboardController')->hitungNamabuku() }}</p>
                <p>Total Nama Buku</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Total Pengguna</p>
                <p class="fs-30 mb-2">{{ app('App\Http\Controllers\DashboardController')->hitungPengguna() }}</p>
                <p>Total Seluruh Pengguna</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Daftar Peminjaman</p>
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
                        @foreach ($datapeminjam as $key => $row)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->nama_peminjam }} </td>
                            <td>{{ $row->tambahbuku->nama_buku }} </td>
                            <td>{{ $row->kode_buku }} </td>
                            <td>{{ $row->tanggal_pinjam }} </td>
                            <td>{{ $row->tenggat }} </td>
                            <td><div class="d-flex">
                                @if ($row->status === 'pending')
                                    <button type="button" class="btn btn-outline-danger mr-1 approve-btn"
                                        data-id="{{ $row->id }}">Menunggu Persetujuan</button>
                                @endif
                                @if ($row->status === 'acc')
                                <button type="button" class="btn btn-outline-primary mr-1 approve-btn"
                                    data-id="{{ $row->id }}">Sedang Dipinjam</button>

                                @endif
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  </div>
                </div>
              </div>
              </div>
            </div>


          </div>
        </div>
    <!-- partial -->
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
    <!-- End custom js for this page-->
  @endsection
</body>


<!-- Mirrored from themewagon.github.io/skydash/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2023 07:02:27 GMT -->

</html>
