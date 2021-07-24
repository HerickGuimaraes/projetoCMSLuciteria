@extends('site.layouts')

@section('title', $page['title'])

@section('content_header1')
Collecting elements is a fun way to learn about chemistry and nature in general.
Anyone can start a collection of chemical elements as many are easily found even 
right in your home. Ordinary pencil lead is actually carbon and, speaking of lead,
this one can also be easily found as fishing line sinkers in any hardware store.
Except sinkers are increasingly being made of bismuth instead as it's more friendly 
to the environment. And the list goes on. Of the 92 naturally occurring elements 
over 80 are collectible with probably half of those being relatively easy to find
in more or less pure form.
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