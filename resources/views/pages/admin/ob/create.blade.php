@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href= "{{ route('admin.ob.index') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <form role="form" method="post" action="{{ route('admin.ob.create') }}">
                    @csrf
                    @include('pages.admin.ob.partials.form-control')
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
