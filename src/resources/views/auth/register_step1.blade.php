<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-screen">
    <div class="auth-box">
        <h1>PiGLy</h1>
        <p>新規登録</p>

        <form method="POST" action="{{ route('postStep1') }}">
            @csrf

            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" name="name" id="name" placeholder="名前を入力">
                @error('name')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" placeholder="メールアドレスを入力">
                @error('email')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" placeholder="パスワードを入力">
                @error('password')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">次に進む</button>
        </form>


        <div class="link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </div>
</body>

</html>