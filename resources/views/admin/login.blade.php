@extends('adminlte::auth.login')
@section('container_header')
@if($message = Session::get("ERROR"))
    <div class="col-12">
        <div class="alert alert-danger">{{ $message }}</div>
    </div>
@endif
@if($message = Session::get("success"))
<div class="col-12">
    <div class="alert alert-sucess">{{ $message }}</div>
</div>
@endif
@endsection