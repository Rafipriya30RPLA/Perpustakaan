@extends('nav-side-admin')
@section('header')
@endsection
@section('sidebar')


@endsection
@section('content')

<script>
    body{margin-top:20px;}
.avatar{
width:200px;
height:200px;
}
</script>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>

          <input type="file" class="form-control">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">

        <h3>Personal info</h3>

        <form action="" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama Pengguna:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="dey-dey">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>

        </form>
      </div>
  </div>
</div>
<hr>

    @endsection
