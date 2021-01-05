@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header"> <p> <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>Refresh</button> </p> </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Bertugas</th>
                                <th>Laporan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                                <td>
                                    <a target="_blank" href="{{ route('admin.verif.pdf',['outdoor', $data]) }}" class="btn btn-success btn-sm">PDF</a>
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
