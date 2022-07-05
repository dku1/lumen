<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('personal.index')) active @endif" aria-current="page" href="{{ route('personal.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('personal.liked') ) active @endif" href="{{ route('personal.liked') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Избранное
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('personal.comments') or request()->routeIs('comments.edit')) active @endif" href="{{ route('personal.comments') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Комментарии
                </a>
            </li>
        </ul>
    </div>
</nav>
