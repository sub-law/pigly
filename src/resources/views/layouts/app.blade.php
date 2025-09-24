<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PiGly')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/app.css') }}">
    @yield('styles')
</head>

<body>

    {{-- ヘッダー --}}
    <header class="main-header">
        <div class="header-left">
            <h1 class="logo">PiGLy</h1>
        </div>
        <div class="header-right">
            <a href="{{ route('goal_setting') }}" class="btn goal-btn">目標体重の再設定</a>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn logout-btn">ログアウト</button>
            </form>
        </div>
    </header>


    {{-- メインコンテンツ --}}
    <main class="main-content">
        @yield('content')
    </main>

</body>

</html>