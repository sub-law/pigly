@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('content')
<div class="dashboard-container">

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
            <form method="GET" action="{{ route('search') }}">
                <select name="from_date">...</select>
                <select name="to_date">...</select>
                <button type="submit" class="btn search-btn">検索</button>
            </form>
            <a href="{{ route('create') }}" class="btn add-btn">データ追加</a>
        </div>

        <table class="log-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>カロリー</th>
                    <th>運動時間</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>

                    <td>{{ number_format($log->weight, 1) }} kg</td>

                    <td>{{ number_format($log->calories) }} col</td>

                    @php
                    $parts = explode(':', $log->exercise_time);
                    @endphp
                    <td>{{ $parts[0] }}時間{{ $parts[1] }}分</td>

                    <td>
                        <a href="{{ route('detail', $log->id) }}" class="icon edit-icon">✏️</a>
                        <form method="POST" action="{{ route('delete', $log->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon delete-icon">🗑️</button>
                        </form>
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