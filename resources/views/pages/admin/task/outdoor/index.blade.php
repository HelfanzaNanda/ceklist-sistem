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

                    <a href="{{ route('admin.task.create', 'outdoor') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i>
                        Tambah Data</a>
                </p>
            </div>
            @include('pages.admin.task.partial.table')
        </div>

    </div>
</div>
@endsection

