<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>初期体重設定</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-screen">
    <div class="auth-box">
        <h1>PiGLy</h1>
        <p>STEP2 体重データの入力</p>

        <form method="POST" action="{{ route('step2') }}">
            @csrf

            <div class="form-group">
                <label for="current_weight">現在の体重 (kg)</label>
                <input type="number" step="0.1" name="current_weight" id="current_weight"
                    placeholder="現在の体重を入力">
                @error('current_weight')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="target_weight">目標の体重 (kg)</label>
                <input type="number" step="0.1" name="target_weight" id="target_weight"
                    placeholder="目標の体重を入力">
                @error('target_weight')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">アカウント作成</button>
        </form>

    </div>
</body>

</html>