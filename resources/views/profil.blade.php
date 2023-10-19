@extends('nav-side-admin')
@section('header')
@endsection
@section('sidebar')
@endsection
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('storage/img/fotoprofil/' . Auth::user()->fotoprofil) }}" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                <h6>Upload a different photo...</h6>
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Personal info</h3>
            <form action="simpanprofil/{{ Auth::user()->id }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Pengguna:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" type="text" value="{{ Auth::user()->name  }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Foto:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fotoprofil" type="file">
                    </div>
                </div>
                <br>
                <!-- Tambahkan tombol "Simpan Profil" di sini -->
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-8">
                        <button type="submit"class="btn btn-outline-primary">Simpan Profil</button>
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
<hr>
@endsection
