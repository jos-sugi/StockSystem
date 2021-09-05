
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<html>
    <body>
        <form action="{{action('NextController@store')}}" method="POST">
            @csrf
            <input type="text" name="item" value="" />
            <input type="text" name="number" value="" />
            <input type="text" name="money" value="" />
        　　<input type="submit" name="submit" value="ページ遷移" />
        </form>
    </body>
</html>
@endsection