
@extends('layouts.app')

@section('title', 'Page Title')
@section('content')
<html>
    <body>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>個数</th>
            <th>金額</th>
            <th>削除</th>
        </tr>
        </thead>
        </table>
        @foreach ($data as $datalist)
        <table class="table table-striped">
        <thead> 
            <tr>
                <td>{{ $datalist->id }}</td>
                <td>{{ $datalist->item }}</td>
                <td>{{ $datalist->number }}</td>
                <td>{{ $datalist->money }}</td>
                <form action="{{ action('DestroyController@destroy', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <td><a href="#" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a></td>
                </form>

            </tr>
        </thead>
        </table>
        @endforeach

    </body>
    <form action="/">
        <button type="submit" class="btn btn-default">
        <i class="fa fa-plus"></i>登録
    </form>

</html>
<script>
function deletePost(e) {
  'use strict';
 
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection