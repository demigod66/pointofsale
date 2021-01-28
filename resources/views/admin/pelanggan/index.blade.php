@extends('backend.index')
@section('sub-judul','Pelanggan')
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


  <a href="{{ route('pelanggan.create')}}" class="btn btn-primary btn-sm">Create</a>


                <div class="pt-4">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Pimpinan</th>
                    <th>Admin</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach( $pelanggan as $result => $hasil)
                  <tr>
                    <td>{{ $result + $pelanggan->firstitem()}}</td>
                    <td>{{$hasil->kode}}</td>
                    <td>{{$hasil->nama}}</td>
                    <td>{{$hasil->alamat}}</td>
                    <td>{{$hasil->nohp}}</td>
                    <td>{{$hasil->namapimpinan}}</td>
                    <td>{{$hasil->namaadmin}}</td>
                    <td>
                      <form action="{{ route('pelanggan.destroy', $hasil->id )}}" method="POST">
                        @csrf
                        @method('delete')
                      <a href="{{route('pelanggan.edit', $hasil->id)}}" class="btn btn-primary btn-sm">CHANGE</a>
                      <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                    </td>
                    
                  </tr>
                  </tbody>
                  @endforeach
                </table>
                {{ $pelanggan->links() }}
          </div>
          
          


@endsection