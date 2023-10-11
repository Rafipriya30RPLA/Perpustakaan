@extends('nav-side')
@section('sidebar')
@section('header')
@section('css')

@endsection

@endsection

@endsection
@section('content')


<div class="card-body p-4 pb-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class="ti ti-menu-2 fs-6"></i>
      </a>
      <h5 class="fs-5 fw-semibold mb-0 d-none d-lg-block">Products</h5>
      <form class="position-relative">
        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Product">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
      </form>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$285 <span class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$650 <span class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s6.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Gaming Console</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$25 <span class="ms-2 fw-normal text-muted fs-3"><del>$31</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Boat Headphone</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s10.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Toy Dino for Fun</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$210 <span class="ms-2 fw-normal text-muted fs-3"><del>$250</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$150 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s8.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Shoes for Girls</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$300 <span class="ms-2 fw-normal text-muted fs-3"><del>$380</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s9.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Short & Sweet Purse</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$175 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s3.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">The Psychology of Money</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$125 <span class="ms-2 fw-normal text-muted fs-3"><del>$137</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s1.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">How Innovation Works</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$275 <span class="ms-2 fw-normal text-muted fs-3"><del>$350</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s12.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Little Angel Toy</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$5 <span class="ms-2 fw-normal text-muted fs-3"><del>$10</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-4">
        <div class="card hover-img overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="javascript:void(0)"><img src="../../dist/images/products/s2.jpg" class="card-img-top rounded-0" alt="..."></a>
            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">Psalms Book for Growth</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">$89 <span class="ms-2 fw-normal text-muted fs-3"><del>$99</del></span></h6>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
