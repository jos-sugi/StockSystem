@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="jumbotron jumbotron-fluid" style="background: rgba(149,195,176,0.3);">
            <div class="container">
            <h1 class="display-4">Hello!</h1>
                <hr class="my-4">
                <p>ようこそ {{Auth::user()->name}} さん</p>
                @if (Auth::user()->usertype === 1)
                <p>ユーザー権限：管理者</p>
                @elseif (Auth::user()->usertype === 0)
                <p>ユーザー権限：社員</p>
                @elseif (Auth::user()->usertype === 2)
                <p>ユーザー権限：受注者</p>
                @endif
            </div>
            </div>
    </div>
</div>
@endsection