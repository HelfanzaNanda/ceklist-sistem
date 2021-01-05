@extends('layouts.ob')
@section('content')
<div class="text-center">
    <h1 style="font-family: Arial, Helvetica, sans-serif;">Selamat Datang {{ auth()->user()->name }}</h1>
</div>
@endsection
