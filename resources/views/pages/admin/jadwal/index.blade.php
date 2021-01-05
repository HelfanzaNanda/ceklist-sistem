@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                        Refresh</button>
                    <a href="{{ route('admin.schedulle.create') }}" class="btn btn-sm btn-flat btn-primary"><i
                            class="fa fa-plus"></i> Tambah Hari</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>OB Bertugas</th>
                                <th>Jam Kerja</th>
                                <th>Istirahat</th>
                                <th>Jam Pulang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedulles as $schedulle)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedulle->day }}</td>
                                <td>{{ $schedulle->name_ob }}</td>
                                <td>{{ $schedulle->working_hour }}</td>
                                <td>{{ $schedulle->break }}</td>
                                <td>{{ $schedulle->home_hour }}</td>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ route('admin.schedulle.edit', $schedulle) }}" class="d-inline btn btn-warning btn-xs btn-edit" id="edit">
                                            <i class="fa fa-pencil-square-o"></i></a>
                                            <div style="display: inline">
                                                <form action="{{ route('admin.schedulle.delete', $schedulle) }}" method="post"
                                                style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" id="delete" class="d-inline btn btn-danger btn-xs btn-hapus">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </div>

                                    </div>
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