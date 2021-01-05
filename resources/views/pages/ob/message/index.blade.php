@extends('layouts.ob')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                        Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{ route('ob.mesage.update') }}">
                    @csrf
                    @method('put')
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Isi Pesan</label>
                            <textarea class="form-control" name="body" rows="5">{{ old('body') ?? $m->body }}</textarea>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
