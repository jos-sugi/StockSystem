
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<html>
    <body>
	@if (Auth::check())
    <form action="{{action('NextController@store')}}" method="POST" class="form-horizontal">
    @csrf
	<div class="form-group">
        <label class="col-sm-2 offset-2 control-label">商品名：</label>
		<div class="col-sm-8 offset-2">
            <input type="text" class="form-control" name="item" placeholder="商品名を入力してください">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 offset-2 control-label" for="InputPassword">個数</label>
		<div class="col-sm-8 offset-2">
			<input type="number" class="form-control" name="number" placeholder="個数を入してください"/>
		</div>
	</div>
    <div class="form-group">
		<label class="col-sm-2 offset-2 control-label" for="InputPassword">値段</label>
		<div class="col-sm-8 offset-2">
            <input type="number" class="form-control" name="money" placeholder="値段を入してください"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-3" style="float: right;">
            <input type="submit" name="submit" value="登録" class="btn btn-primary btn-wide"/>
		</div>
	</div>
    </form>
    </body>
	@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome!在庫管理システム</h1>
			<hr class="my-4">
			<p><a class="btn btn-info btn-lg" href="/login" role="button">Login now</a></p>
    
        </div>
    </div>
	@endif
</html>
@endsection