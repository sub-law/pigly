@extends('layouts.app')

@section('title', '目標体重設定')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
@endsection

@section('content')
<div class="a">
    <div class="b">
        <p>目標体重設定</p>
        <p>目標まで</p>

    </div>
    <div class="e">
        <div class="c">
            <a href="{{ route('top') }}">戻る</a>
        </div>

        <div class="d">
            <p>更新</p>
        </div>
    </div>
</div>
@endsection