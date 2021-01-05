@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>Refresh</button>
                    <a href="{{ route('admin.task.index', 'outdoor') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Kembali</a>
                </p>
                <x-alert-error/>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{ route('admin.task.post') }}">
                    @csrf
                    <input type="hidden" value="outdoor" name="state">
                    @include('pages.admin.task.partial.form-control')
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
