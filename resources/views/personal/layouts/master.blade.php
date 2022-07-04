<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <link href="/css/personal/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/personal/dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"
       style="pointer-events: none">{{ auth()->user()->login }}</a>
    <div class="d-flex p-1">
        <div class="navbar-nav">
            <div class="nav-item">
                <a class="nav-link px-3" href="{{ route('index') }}">Вернуться на сайт</a>
            </div>
        </div>
        <div class="navbar-nav">
            <div class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger">Выход</button>
                </form>
            </div>
        </div>
    </div>

</header>

<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sub-layouts.session-flash')
        @include('personal.layouts.sub-layouts.nav')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
