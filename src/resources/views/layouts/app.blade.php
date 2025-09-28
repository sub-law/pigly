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

    <header class="main-header">
        <div class="header-left">
            <h1 class="logo">PiGLy</h1>
        </div>

        <div class="header-right">
            <div class="setting-group">
                <a href="{{ route('weight_logs.goal_setting') }}" class="btn goal-btn"><img src="{{ asset('images/settings.svg') }}" alt="アイコン" class="icon">目標体重設定</a>
            </div>

            <div class="logout-group">
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn logout-btn"><img src="{{ asset('images/logout.svg') }}" alt="アイコン" class="icon">ログアウト</button>
                </form>
            </div>
        </div>
    </header>


    {{-- メインコンテンツ --}}
    <main class="main-content">
        @yield('content')
    </main>

    @yield('scripts')


</body>

</html>