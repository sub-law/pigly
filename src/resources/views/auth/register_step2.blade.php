<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>初期体重登録</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

    <header class="header">
        <div class="header__inner">

        </div>
    </header>

    <main>

        <h1>PiGly</h1>
        <h2>新規会員登録</h2>

        <h3>STEP2 体重データの入力</h3>

        <div class="a">
            <p>現在の体重</p>
            <p>目標の体重</p>
        </div>

        <div class="b">
            <a href="{{ route('top') }}">アカウント作成</a>
        </div>
    </main>
</body>

</html>