@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ route('admin.ob.create') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Diedit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ route('admin.ob.edit',$user) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <div style="display: inline">
                                            <form action="{{ route('admin.ob.destroy', $user) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="delete" class="d-inline btn btn-danger btn-xs btn-hapus">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ date('d F Y H:i:s',strtotime($user->created_at)) }}</td>
                                <td>{{ date('d F Y H:i:s',strtotime($user->updated_at)) }}</td>
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