@extends('layouts.app')

@section('title', '体重ログ編集')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <div class="edit-box">
        <h2>体重ログ編集</h2>

        <form method="POST" action="{{ route('weight_logs.update', $log->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="edit-item">
                    <label>日付</label>
                    <input type="date" name="date" value="{{ old('date', $log->date->format('Y-m-d')) }}">
                </div>
                @error('date')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="edit-item">
                    <label>体重</label>
                    <div class="input-with-unit">
                        <input type="number" step="0.1" name="weight" value="{{ old('weight', $log->weight) }}">
                        <span class="unit">kg</span>
                    </div>
                    @error('weight')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="edit-item">
                    <label>摂取カロリー</label>
                    <div class="input-with-unit">
                        <input type="number" name="calories" value="{{ old('calories', $log->calories) }}">
                        <span class="unit">cal</span>
                    </div>
                    @error('calories')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="edit-item">
                    <label>運動時間</label>
                    <input type="time" name="exercise_time" value="{{ old('exercise_time', $log->exercise_time) }}">
                </div>
                @error('exercise_time')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="edit-item">
                    <label>運動内容</label>
                    <textarea name="exercise_content"> {{ old('exercise_content', $log->exercise_content) }}</textarea>
                </div>
                @error('exercise_content')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-row">
                <div class="button-group">
                    <div class="center-buttons">
                        <a href="{{ route('weight_logs.index') }}" class="btn back-btn">戻る</a>
                        <button type="submit" class="btn update-btn">更新</button>
                    </div>
                </div>
            </div>

        </form>

        <div class="button-row">
            <div class="delete-button-wrapper">
                <form method="POST" action="{{ route('weight_logs.delete', $log->id) }}" onsubmit="return confirm('本当に削除しますか？');" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn delete-btn" aria-label="ログを削除">🗑️</button>

                </form>
            </div>
        </div>


    </div>
</div>
@endsection