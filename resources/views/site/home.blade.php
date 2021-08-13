@extends('site.layouts')

@section('title', 'lucitera')
@foreach($pages as $page)
@section('content_header1')
{{$page->subtitle}}
@endsection
@section('content_header2')
{{$page->subtitle1}}   
@endsection
@section('content_header3')
{{$page->subtitle2}}
@endsection
@endforeach
@section('conteiner')
    
@endsection