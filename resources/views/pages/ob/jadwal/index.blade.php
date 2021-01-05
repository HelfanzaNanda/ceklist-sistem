@extends('layouts.ob')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p> <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button> </p>
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
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($schedulles as $schedulle)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $schedulle->day }} </td>
                                <td> {{ $schedulle->name_ob }} </td>
                                <td> {{ $schedulle->working_hour }} </td>
                                <td> {{ $schedulle->break }} </td>
                                <td> {{ $schedulle->home_hour }} </td>
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
