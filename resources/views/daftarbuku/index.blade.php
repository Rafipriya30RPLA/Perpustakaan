@extends('nav-side-admin')
@section('sidebar')
@section('header')


@endsection
@endsection

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @endsection
  </head>
  <body>
    <style>
        /* CSS to set a fixed aspect ratio for the card's image container */
        .card-img-container {
            position: relative;
            padding-bottom: 80%; /* 1:1 Aspect Ratio (adjust as needed) */
        }

        .card-img-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>


    @section('content')
    <div class="card-body p-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="ti ti-menu-2 fs-6"></i>
            </a>
            <h5 class="fs-5 fw-semibold mb-0 d-none d-lg-block">Daftar Buku</h5>
            <form action="/daftarbuku" class="position-relative" method="GET">
                <input type="text" class="form-control search-chat py-2 ps-5"name="search" id="text-srh" placeholder="Search Product">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="row">
            @forelse($Buku as $data)
            <div class="col-sm-6 col-md-3"> <!-- Each image is placed in a 4-column grid -->
                <div class="card hover-img overflow-hidden rounded-2">
                    <div class="position-relative card-img-container"> <!-- Added container for image -->
                        <a href="/daftarbuku/preview/{{ $data->id }}">
                            <img src="{{ asset('storage/tambahbuku/' . $data->foto) }}" class="card-img-top rounded-0"
                                alt="...">
                        </a>
                        <a href="javascript:void(0"
                            class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                class="ti ti-basket fs-4"></i></a>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">{{ $data->nama_buku }}</h6>
                        <div class="d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div style="width: 100%; height: 50vh; justify-content: center; align-items: center; display: flex">
                <div><h1 style="letter-spacing: 3px; color: grey; text-transform: uppercase; font-size: 23px; font-weight: 800">Tidak Ada Buku</h1></div>
            </div>
            @endforelse
        </div>
         <!-- Tautan paginasi -->
         {{  $Buku->links() }}
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
