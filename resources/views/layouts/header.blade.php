<div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                @auth()
                <a class="link-secondary" href="#">{{ auth()->user()->login }}</a>
                @endauth
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Lumen</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @auth()
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary">Выход</button>
                    </form>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}" style="margin-right: 10px">Вход</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Регистрация</a>
                @endauth
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="#">Главная</a>
            <a class="p-2 link-secondary" href="#">Категории</a>
            <a class="p-2 link-secondary" href="#">Популярное</a>
            <a class="p-2 link-secondary" href="#">Публикации недели</a>
            <a class="p-2 link-secondary" href="#">Самое обсуждаемое</a>
            <a class="p-2 link-secondary" href="#">Связаться с нами</a>
            <a class="p-2 link-secondary" href="#">Личный кабинет</a>
            @auth()
                @if(auth()->user()->isAdmin())
                    <a class="p-2 link-secondary" href="{{ route('admin.main') }}">Панель управления</a>
                @endif
            @endauth
        </nav>
    </div>
</div>
