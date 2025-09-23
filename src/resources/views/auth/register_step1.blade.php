<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>新規登録</title>
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
        <h3>STEP1 アカウント情報の登録</h3>

        <div class="a">
            <p>お名前</p>
            <p>メールアドレス</p>
            <p>パスワード</p>
        </div>

        <div class="b">
            <a href="{{ route('step2')}}">次に進む</a>
            </br>
            <a href="{{ route('login')}}">ログインはこちら</a>
        </div>
    </main>
</body>

</html>