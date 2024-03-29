@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
            <a href="{{ route('wali.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
            </a>
           </div>
                <div class="card-body">
                        <div class="table">
                            <table class="table-responsive">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Wali</th>
                                    <th>Foto</th>
                                    <th>Nama Siswa</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($wali as $data)
                                    <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <img src="{{ $data->image() }}" style="width: 100px; height:100px;" alt="">
                                    </td>
                                    <td>{{ $data->siswa->nama }}</td>
                                    <td>
                                    <form  action=" {{ route('wali.destroy', $data->id)}} " method="post"> 
                                        @csrf
                                        @method('delete')
                                        <a href=" {{route('wali.edit', $data->id)}} "
                                          class="btn btn-sm btn-outline-success">Edit</a>
                                          <a href=" {{route('wali.show', $data->id)}} "
                                          class="btn btn-sm btn-outline-warning" >Show</a>
                                          <button type="submit" class="btn btn-sm btn-outline-danger"
                                          onclick="return confirm('Apakah Anda Yakin')">Delete
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                     </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
