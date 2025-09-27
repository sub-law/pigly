@extends('layouts.app')

@section('title', '目標体重設定')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
@endsection

@section('content')
<div class="goal-setting-container">
    <div class="goal-setting-box">
        <h2>目標体重設定</h2>

        <form method="POST" action="{{ route('weight_logs.goal_setting.update') }}">
            @csrf
            @method('PUT')

            <div class="input-group">
                <input type="number" step="0.1" name="target_weight" value="{{ old('target_weight', $targetWeight) }}" >
                <span class="unit">kg</span>
            </div>

            @error('target_weight')
            <p class="error">{{ $message }}</p>
            @enderror

            <div class="button-group">
                <a href="{{ route('weight_logs.index') }}" class="btn back-btn">戻る</a>
                <button type="submit" class="btn update-btn">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection