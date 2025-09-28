@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="dashboard-container">

    @if (session('status'))
    <div class="flash-message">
        {{ session('status') }}
    </div>
    @endif

    {{-- グリッドA：目標情報 --}}
    <div class="grid-a">
        <div class="metric-box">
            <p class="label">目標体重</p>
            <p class="value">{{ $targetWeight }} kg</p>
        </div>
        <div class="metric-box">
            <p class="label">目標まで</p>
            <p class="value">{{ $latestWeight - $targetWeight }} kg</p>
        </div>
        <div class="metric-box">
            <p class="label">最新体重</p>
            <p class="value">{{ $latestWeight }} kg</p>
        </div>
    </div>

    {{-- グリッドB：体重ログ一覧 --}}
    <div class="grid-b">
        <div class="grid-b-header">
            <form method="GET" action="{{ route('weight_logs.search') }}">
                <input type="date" name="from_date" value="{{ request('from_date') }}" class="date-input">
                <p>～</p>
                <input type="date" name="to_date" value="{{ request('to_date') }}" class="date-input">
                <button type="submit" class="btn search-btn">検索</button>
                @if(request('from_date') || request('to_date'))
                <a href="{{ route('weight_logs.index') }}" class="btn reset-btn">リセット</a>
                @endif
            </form>

            <!-- トリガー -->
            <a href="#" class="btn add-btn">データ追加</a>
        </div>

        @if(request('from_date') || request('to_date'))
        <p class="search-summary">
            {{ request('from_date') ? \Carbon\Carbon::parse(request('from_date'))->format('Y年n月j日') : '未指定' }}
            ～
            {{ request('to_date') ? \Carbon\Carbon::parse(request('to_date'))->format('Y年n月j日') : '未指定' }}
            の検索結果 {{ $weightLogs->total() }}件
        </p>
        @endif


        <!-- モーダル背景 -->
        <div id="modal-overlay" class="modal-overlay hidden"></div>

        <!-- モーダル本体 -->

        <div id="modal" class="modal {{ $errors->any() ? '' : 'hidden' }}">
            <form method="POST" action="{{ route('weight_logs.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        日付 <span class="required-tag">必須</span>
                    </label>
                    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                    @error('date')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        体重 <span class="required-tag">必須</span>
                    </label>
                    <div class="input-with-unit">
                        <input type="number" name="weight" step="0.1" value="{{ old('weight') }}">
                        <span class="unit">kg</span>
                    </div>
                    @error('weight')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        摂取カロリー <span class="required-tag">必須</span>
                    </label>
                    <div class="input-with-unit">
                        <input type="number" name="calories" value="{{ old('calories') }}">
                        <span class="unit">cal</span>
                    </div>
                    @error('calories')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        運動時間 <span class="required-tag">必須</span>
                    </label>
                    <div class="input-with-unit">
                        <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
                    </div>
                    @error('exercise_time')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>運動内容</label>
                    <textarea name="exercise_content">{{ old('exercise_content') }}</textarea>
                    @error('exercise_content')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-buttons">
                    <button type="button" class="btn-close modal-close">戻る</button>
                    <button type="submit" class="btn-submit">登録</button>
                </div>

            </form>
        </div>




        <table class="log-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>カロリー</th>
                    <th>運動時間</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>

                    <td>{{ number_format($log->weight, 1) }} kg</td>

                    <td>{{ number_format($log->calories) }} cal</td>

                    @php
                    $parts = explode(':', $log->exercise_time);
                    @endphp
                    <td>{{ $parts[0] }}時間{{ $parts[1] }}分</td>

                    <td>
                        <a href="{{ route('weight_logs.edit', $log->id) }}" class="icon edit-icon">✏️</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="pagination-wrapper">
            {{ $weightLogs->links('pagination::bootstrap-4') }}

        </div>

    </div>
    @endsection

    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('modal-overlay');
            const openBtn = document.querySelector('.add-btn');
            const closeBtn = document.querySelector('.modal-close');

            openBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.classList.remove('hidden');
                overlay.classList.remove('hidden');
            });

            closeBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                overlay.classList.add('hidden');
            });

            overlay.addEventListener('click', function() {
                modal.classList.add('hidden');
                overlay.classList.add('hidden');
            });
        });
    </script>
    @endsection