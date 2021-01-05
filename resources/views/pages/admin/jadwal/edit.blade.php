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
                    <a href="{{ route('admin.schedulle.index') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Kembali</a>
                </p>
                <x-alert-error/>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{ route('admin.schedulle.edit', $schedulle) }}">
                    @csrf
                    @method('put')
                    @include('pages.admin.jadwal.partials.form-control')
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
