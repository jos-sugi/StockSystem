
@extends('layouts.app')

@section('title', 'Page Title')
@section('content')
<html>
    <body>
    <div class="col-md-12">
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
        <tbody> 
            <tr>
            @foreach ($data as $datalist)
                <td>{{ $datalist->id }}</td>
                <td>{{ $datalist->item }}</td>
                <td>{{ $datalist->number }}</td>
                <td>{{ $datalist->money }}</td>
                <td><form action="{{ action('DestroyController@destroy', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="#" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);" ><i class="fa fa-trash"></i>削除</a></form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </body>
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