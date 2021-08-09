@extends('site.layouts')

@section('title', $page['title'])

@section('content_header1')
{!! $page['subtitle']!!}
@endsection
@section('content_header2')
We are located in Washington State USA and with few exceptions, as noted,
we can ship element samples to most countries quickly and at the most reasonable rates.
Your cart will give you delivery costs prior to sending payment but please let us know 
if you have any questions - we're always glad to help!    
@endsection
@section('content_header3')
"Follow us on "
<b>
    <font color="blue">
        <a href="#"> Twitter</a>
    </font>
</b>
" for all the latest announcements!"
@endsection

@section('conteiner')
    {!! $page['body'] !!}
@endsection