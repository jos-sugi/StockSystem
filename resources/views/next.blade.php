
@extends('layouts.app')

@section('title', 'Page Title')z
@section('content')
<html>
    <body>
        <p>idは：{{ $data[0]->id }}です。</p>
        <p>在庫名は：{{ $data[0]->item }}です。</p>
        <p>在庫数は：{{ $data[0]->number }}です。</p>
        <p>単価は：{{ $data[0]->money }}です。</p>
    </body>
</html>
@endsection
