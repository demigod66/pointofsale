@extends('backend.index')
@section('content')


@if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
  </div>
  @endif


<div class="row">
    <div class="col-md-12">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Pelanggan</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            
          <div class="form-group">
            <label>Kode</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- Date mm/dd/yyyy -->
          <div class="form-group">
            <label>Nama</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- phone mask -->
          <div class="form-group">
            <label>Alamat Pelanggan</label>

            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Pelanggan">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- phone mask -->
          <div class="form-group">
            <label>Telepon</label>
            

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" placeholder="Masukkan No.Hp" name="nohp">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- IP mask -->
          <div class="form-group">
            <label>Nama Pimpinan</label>

            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" placeholder="Masukkan Nama Pimpinan" name="namapimpinan">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Nama Admin</label>

            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" placeholder="Masukkan Nama Admin" name="namaadmin">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block">Simpan Post</button>
        </div>
      

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </form>
@endsection