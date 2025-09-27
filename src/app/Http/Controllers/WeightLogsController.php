<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Http\Requests\UpdateWeightLogRequest;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\UpdateTargetWeightRequest;

class WeightLogsController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */

        $user = auth()->user();//認証済みのユーザー情報を取得

        $targetWeight = $user->weightTarget->target_weight ?? null;
        //userモデルのweightTargetリレーションから target_weight を取得

        $weightLogsQuery = $user->weightLogs()->orderByDesc('date');
        //User モデルの weightLogs リレーションからログ一覧を取得
        //date カラムで降順に並び替え（最新が先頭）

        $latestWeight = optional($weightLogsQuery->first())->weight;
        //並び替え済みのログから最初の1件（最新）を取得
        //optional() によって、ログが存在しない場合でもエラーにならず null を返す

        $weightLogs = $weightLogsQuery->paginate(8);
        //1ページあたり8件で分割
        //Blade側で {{ $weightLogs->links() }} を使えばページネーションUIも表示可能

        return view('weight_logs.index', compact('targetWeight', 'latestWeight', 'weightLogs'));
        //weight_logs/index.blade.php に3つの変数を渡す
        //$targetWeight：目標体重
        //$latestWeight：最新の記録体重
        //$weightLogs：体重ログ一覧（ページネーション付き）
    }

    public function goal_setting()
    {
        $user = auth()->user(); //現在ログインしているユーザー情報を取得
        $targetWeight = optional($user->weightTarget)->target_weight;
        //$user->weightTarget は hasOne リレーション（1ユーザーに1つの目標体重）
        //optional() を使うことで、weightTarget が存在しない場合でもエラーにならず null を返す

        return view('weight_logs.goal_setting', compact('targetWeight'));
    }

    public function updateGoal(UpdateTargetWeightRequest $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:30|max:200',
        ]);


        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->weightTarget()->updateOrCreate(
            ['user_id' => $user->id],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('weight_logs.index')->with('status', '目標体重を更新しました');
    }



    public function store(StoreWeightLogRequest $request)
    {
        $validated = $request->validated();

        WeightLog::create([
            'user_id' => auth()->id(),
            'date' => $validated['date'],
            'weight' => $validated['weight'],
            'calories' => $validated['calories'],
            'exercise_time' => $validated['exercise_time'],
            'exercise_content' => $validated['exercise_content'],
        ]);

        return redirect()->route('weight_logs.index')->with('status', 'ログを登録しました');
    }

    public function edit($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);

        return view('weight_logs.edit', compact('log'));
    }

    public function update(UpdateWeightLogRequest $request, $weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);

        $validated = $request->validated();

        $log->update($validated);

        return redirect()->route('weight_logs.index')->with('status', 'ログを更新しました');
    }

    public function delete($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);

        $log->delete();

        return redirect()->route('weight_logs.index')->with('status', '削除しました');
    }

    public function search(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        $query = $user->weightLogs()->orderByDesc('date');

        if ($from) {
            $query->where('date', '>=', $from);
        }

        if ($to) {
            $query->where('date', '<=', $to);
        }

        $weightLogs = $query->paginate(8);
        $targetWeight = optional($user->weightTarget)->target_weight;
        $latestWeight = optional($query->first())->weight;

        return view('weight_logs.index', compact('targetWeight', 'latestWeight', 'weightLogs'));
    }

}

