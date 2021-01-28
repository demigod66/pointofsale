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


<a href="{{ route('pemasok.create')}}" class="btn btn-primary">Create</a>


<div class="card-body">
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
            @foreach( $pemasok as $result)
            <tr>
                <td>{{$result->id}}</td>
                <td>{{$result->kode}}</td>
                <td>{{$result->nama}}</td>
                <td>{{$result->alamat}}</td>
                <td>{{$result->nohp}}</td>
                <td>{{$result->namapimpinan}}</td>
                <td>{{$result->namaadmin}}</td>
                <td>
                    <form action="{{ route('pemasok.destroy', $result->id )}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('pemasok.edit', $result->id)}}" class="btn btn-primary btn-sm">CHANGE</a>
                        <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                </td>

            </tr>
        </tbody>
        @endforeach
        <tfoot>
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
        </tfoot>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->



@endsection
