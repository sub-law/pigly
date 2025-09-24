<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PiGLy 初期設定 STEP2</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-screen">
    <div class="auth-box">
        <h1>PiGLy</h1>
        <p>STEP2 体重データの入力</p>

        <form method="POST" action="{{ route('step2') }}">
            @csrf

            <label for="current_weight">現在の体重 (kg)</label>
            <input type="number" step="0.1" name="current_weight" id="current_weight"
                placeholder="現在の体重を入力" required>

            <label for="target_weight">目標の体重 (kg)</label>
            <input type="number" step="0.1" name="target_weight" id="target_weight"
                placeholder="目標の体重を入力" required>

            <button type="submit">アカウント作成</button>
        </form>

    </div>
</body>

</html>