@extends('backend.index')
@section('sub-judul','Beli Master')
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


                <div class="pt-4">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No.Bukti</th>
                    <th>Tanggal</th>
                    <th>Pemasok</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach( $belimaster as $result => $hasil)
                  <tr>
                    <td>{{ $result + $belimaster->firstitem()}}</td>
                    <td>{{$hasil->nobuk}}</td>
                    <td>{{$hasil->tanggal}}</td>
                    <td>{{$hasil->pemasok->nama}}</td>
                    <td>{{$hasil->ket}}</td>
                    <td>
                      <form action="{{ route('belimaster.destroy', $hasil->id )}}" method="POST">
                        @csrf
                        @method('delete')
                      <a href="{{route('pembelian.index', $hasil->id)}}" class="btn btn-primary btn-sm">CHANGE</a>
                      <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                    </td>

                  </tr>
                  </tbody>
                  @endforeach
                </table>
                {{ $belimaster->links() }}
          </div>
        </div>





@endsection
