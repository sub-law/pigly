<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ログイン</title>
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
        <h2>ログイン</h2>

        <div class="a">
            <p>メールアドレス</p>
            <p>パスワード</p>
        </div>

        <div class="b">
            <p>ログイン</p>
            <a href="{{ route('step1')}}">アカウント作成はこちら</a>
        </div>
    </main>
</body>

</html>