
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
                <th>ステータス</th>
                <th>その他</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
            @foreach ($data as $datalist)
                <td>{{ $datalist->id }}</td>
                <td>{{ $datalist->item }}</td>
                <td>{{ $datalist->number }}</td>
                <td>{{ $datalist->money }}</td>
                <td>@if ($datalist->status === 0) 
                        {{ "発注確認" }}
                    @elseif ($datalist->status === 1)
                        {{ "発注状態" }}
                    @elseif ($datalist->status === 2)
                        {{ "発注済み" }}
                    @elseif ($datalist->status === 3)
                        {{ "発注受け取り済み" }}    
                    @endif
                </td>
                <td><form action="{{ action('DestroyController@destroy', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="#" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);" ><i class="fa fa-trash"></i>削除</a>
                    </form>

                    @if (Auth::user()->usertype === 1 and $datalist->status === 0)
                    <form action="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                        @method('PUT')
                        @csrf
                        <a href="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>発注</a>
                    </form>
                    @endif
                </td>
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