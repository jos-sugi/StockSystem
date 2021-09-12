
@extends('layouts.app')

@section('title', 'Page Title')
@section('content')
<html>
    <body>
    @if (Auth::check())
    <div class="col-md-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>個数</th>
                <th>金額</th>
                <th>ステータス</th>
                <th>削除</th>
                <th>その他</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
            @foreach ($data as $key=>$datalist)
                <td>{{ $key+1 }}</td>
                <td>{{ $datalist->item }}</td>
                <td>{{ $datalist->number }}</td>
                <td>{{ number_format($datalist->money) }}円</td>
                <td>@if ($datalist->status === 0) 
                        <span style="color: black;">発注確認</span>
                    @elseif ($datalist->status === 1)
                        <span style="color: blue;">発注状態</span>
                    @elseif ($datalist->status === 2)
                        <span style="color: red;">発注済み</span>
                    @elseif ($datalist->status === 3)
                        <span style="color: green;">発注受け取り済み</span>
                    @endif
                </td>
                <td><form action="{{ action('DestroyController@destroy', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="#" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);" ><i class="fa fa-trash"></i>削除</a>
                    </form></td>
                    @if (Auth::user()->usertype === 1 and $datalist->status === 0)
                    <td><form action="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                        @method('PUT')
                        <a href="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>確認</a>
                    </form></td>
                    @elseif (Auth::user()->usertype === 2 and $datalist->status === 1)
                    <td><form action="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                        @method('PUT')
                        <a href="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>発注する</a>
                    </form></td>
                    @elseif (Auth::user()->usertype === 1 and $datalist->status === 2)
                    <td><form action="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" method="post">
                        @method('PUT')
                        <a href="{{ action('UpdateController@update', $datalist->id) }}" id="form_{{ $datalist->id }}" data-id="{{ $datalist->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>受け取り</a>
                    </form></td>
                    @else
                    <td></td>
                    @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <form action="{{ action('StocksController@makeCSV')}}" method="get">
    <button href ="/download" type="submit">CSV出力</button></form>
    </body>
    @endif
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