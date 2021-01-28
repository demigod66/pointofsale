@extends('backend.index')
@section('content')



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Input Pembelian</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pembelian.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Bukti</label>
                                        <input type="text" class="form-control" name="nobuk" value="{{ $tanggal }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Pemasok</label>
                                <select class="form-control" name="idpem">
                                    @foreach($pemasok as $result)
                                    <option value="{{ $result->id }}">{{ $result->nama }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="ket" placeholder="keterangan">
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.col (left) -->
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Input Detail</h3>
                    </div>
                    <div class="card-body">
                        <!-- Date range -->
                        <div class="form-group">
                            <label>Nama Stok</label>
                            <select class="form-control" name="persediaan_id">
                                @foreach($persediaan as $result)
                                <option value="{{ $result->id }}">{{ $result->namastok }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>QTY</label>
                                    <input type="text" class="form-control" name="qty" placeholder="QTY">
                                </div>

                                <div class="col-sm-4">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga">
                                </div>
                                <div class="col-sm-4">
                                    <label>Proses</label>
                                    <button type="submit" class="btn btn-block btn-primary btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>




                <!-- /.card -->
            </div>

            <div class="col-md-12">
                <div class="card card-green">
                    <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered  table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Stok</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>subtotal</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $subtotal = 0;
                            @endphp
                              @foreach ( $pembeliand as $result)
                              @php
                                  $total = $result->qty * $result->harga;
                              @endphp
                              <tr>
                              <td>{{ $result->id }}</td>
                              <td>{{ $result->persediaan->namastok}}</td>
                              <td>{{ $result->qty }}</td>
                              <td>@currency($result->harga)</td>
                              <td>@currency ($result->qty * $result->harga)</td>
                              <td>
                                <form action="{{ route('pembelian.destroy', $result->id )}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('pembelian.edit', $result->id)}}" class="btn btn-primary btn-sm">ubah</a>
                                    <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                              </td>
                            </tr>
                            @php
                                $subtotal += $total;
                            @endphp
                          @endforeach
                          <tr>
                            <td colspan="4"> Total : </td>
                            <td>@currency($subtotal)</td>
                          </tr>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>


                <!-- /.card -->
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


<!-- /.content -->

</div>
@include('sweetalert::alert')
@endsection
