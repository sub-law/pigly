@extends('layouts.app')

@section('title', '体重管理画面')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="a">

    <div class="b">
        <p>目標体重</p>
        <p>目標まで</p>
        <p>最新体重</p>
    </div>

    <div class="c">
        <p>日付A</p>
        <p>日付B</p>
        <p>検索</p>
        <p>リセット</p>
        <p>データ追加</p>
    </div>

    <div class="d">
        <p>検索結果</p>
    </div>

    <div class="e">
        <p>日付</p>
        <p>体重</p>
        <p>食事摂取カロリー</p>
        <p>運動時間</p>
        <p>編集ボタン</p>
    </div>

    <div class="f">
        <p>日付</p>
        <p>体重</p>
        <p>食事摂取カロリー</p>
        <p>運動時間</p>
        <p>編集ボタン</p>
    </div>

</div>
@endsection