@extends('backend.index')
@section('sub-judul','Suplier Changes')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Pemasok</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pemasok.update', $pemasok->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Kode</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode" value="{{$pemasok->kode}}">
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
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{$pemasok->nama}}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- phone mask -->
                    <div class="form-group">
                        <label>Alamat pemasok</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat pemasok" value="{{$pemasok->alamat}}">
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
                            <input type="text" class="form-control" placeholder="Masukkan No.Hp" name="nohp" value="{{$pemasok->nohp}}">
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
                            <input type="text" class="form-control" placeholder="Masukkan Nama Pimpinan" name="namapimpinan" value="{{$pemasok->namapimpinan}}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Nama Admin</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Admin" name="namaadmin" value="{{$pemasok->namaadmin}}">
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
