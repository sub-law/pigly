<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-screen">
    <div class="auth-box">
        <h1>PiGLy</h1>
        <p>ログイン</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
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

            <button type="submit">ログイン</button>
        </form>

        <div class="link">
            <a href="{{ route('step1') }}">アカウント作成はこちら</a>
        </div>
    </div>
</body>

</html>