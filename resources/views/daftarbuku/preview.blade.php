@extends('nav-side-admin')
@section('sidebar')
@section('header')
@section('css')
@endsection
@endsection
@endsection
@section('content')
@include('swal')
<div class="container-fluid">
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Detail Produk</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/daftarbuku">Daftarbuku</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">detail</li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="shop-detail">
  <div class="card shadow-none border" style="border-radius: 20%">
    {{-- @foreach ($Buku as $data) --}}
    <div class="card-body p-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="item rounded overflow-hidden">
            <img src="{{ asset('storage/tambahbuku/' . $Buku->foto) }}" alt="" class="img-fluid rounded"
              style="width: 400px; height: 300px;">
          </div>

        </div>
        <div class="col-lg-6">
          <div class="shop-content">
            <div class="d-flex align-items-center gap-2 mb-2">
              <span class="badge text-bg-success fs-2 fw-semibold rounded-3">Dalam Stok</span>
              <span class="fs-2">Buku</span>
            </div>
            <h4 class="fw-semibold">{{ $Buku->nama_buku }}</h4>
            <p class="mb-3"> <td>Dari : {{ $Buku->penulis->penerbit->nama_penerbit }} </td></p>
            <h4 class="fw-semibold mb-3">Stok ({{$Buku->stok}})</h4>

            <div class="d-sm-flex align-items-center gap-3 pt-8 mb-7">
                <form action="{{ route('tambahbuku.borrow', ['id' => $Buku->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                </form>
              <a href="javascript:void(0)" class="btn d-block btn-danger px-7 py-8">Add to Cart</a>
            </div>
            <p class="mb-0">batas waktu pinjam selama 7 hari</p>
          </div>
        </div>
      </div>
    </div>
    {{-- @endforeach --}}
  </div>
  <div class="card shadow-none border">
    <div class="card-body p-4">
      <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
            id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button"
            role="tab" aria-controls="pills-description" aria-selected="true">
            Description
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
            id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button"
            role="tab" aria-controls="pills-reviews" aria-selected="false">
            Reviews
          </button>
        </li>
      </ul>
      <div class="tab-content pt-4" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
          aria-labelledby="pills-description-tab" tabindex="0">
          <h5 class="fs-5 fw-semibold mb-7">
           Deskripsi Buku {{ $Buku->nama_buku }}
          </h5>
          <p class="mb-7">
            {{ $Buku->deskripsi }}
          </p>

        </div>
        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab"
          tabindex="0">
          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="card shadow-none border w-100 mb-7 mb-lg-0">

              </div>
            </div>

            <form action="/preview/post/review" method="POST">
            <div class="d-flex align-items-center gap-3 p-3">
                @csrf
                <input type="hidden" name="id_buku" value="{{ $Buku->id }}">
                <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle"
                  width="33" height="33">
                <input name="review" type="text" value="{{ old('review') }}" class="form-control py-8 @error('review') is-invalid @enderror" id="exampleInputtext" aria-describedby="textHelp"
                  placeholder="Comment">
                <button type="submit" class="btn btn-primary">Comment</button>
            </div>
            <div>
                @foreach ($Komentar as $review)
                    <p>{{ $review->review }}</p>
                @endforeach
            </div>
        </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
<div class="dark-transparent sidebartoggler"></div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<div class="modal fade" id="peminjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
