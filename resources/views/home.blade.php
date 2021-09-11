@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            ようこそ{{Auth::user()->name}}
            @if (Auth::user()->usertype === 1)
            {{"権限：管理者"}}
            @elseif (Auth::user()->usertype === 0)
            {{"権限：社員"}}
            @elseif (Auth::user()->usertype === 2)
            {{"権限：受注者"}}
            @endif
    </div>
</div>
@endsection