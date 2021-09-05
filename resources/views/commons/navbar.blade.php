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
                    
                    <li class="nav-item"><form action="/">
                        <button type="submit" class="btn btn-white">
                        <i class="fa fa-plus"></i>登録</form></li>
                    <li class="nav-item"><form action="/list">
                        <button type="submit" class="btn btn-white">
                        <i class="fa fa-plus"></i>一覧</form></li>
                </ul>
        </div>
    </nav>
</header>
<ul class="navbar-nav">