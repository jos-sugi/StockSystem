<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">在庫管理システム</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                @if (Auth::check())
                ようこそ{{Auth::user()->name}}
                    <li class="nav-item"><form action="/">
                        <button type="submit" class="btn btn-white" style="background-color: #53C5FF;">
                        <i class="fa fa-plus"></i>登録</form></li>
                    <li class="nav-item"><form action="/list" style="width:100%; margin-left: 10%;">
                        <button type="submit" class="btn btn-white" style="background-color: #FCAF24;">
                        <i class="fa fa-book"></i>一覧</form></li>
                    <li class="nav-item"><form action="/logout">
                        <button type="submit" class="btn btn-white" style="background-color: #999999;">
                        <i class="fa fa-book"></i>ログアウト</form></li>
                    </li>
                    @else
                    <li class="nav-item"><form action="/login">
                        <button type="submit" class="btn btn-white" style="background-color: #999999;">
                        <i class="fa fa-login"></i>ログイン</form></li>
                    </li>
                    @endif
                </ul>

        </div>
    </nav>
</header>
<ul class="navbar-nav">