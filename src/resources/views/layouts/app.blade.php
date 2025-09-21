<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PiGly')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>

<body>

    <header class="header">
        <div class="header__inner">
            <p class="header__logo">PiGly</p>
            <a href="{{ route('goal_setting') }}">目標体重設定</a>
            <a href="{{ route('login') }}">ログアウト</a>
            <div class="header__nav">
                @hasSection('header-links')
                @yield('header-links')
                @endif
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>