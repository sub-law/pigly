<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use Carbon\Carbon;

class WeightDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create();

        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        // 35日分の連続日付でログを生成
        for ($i = 0; $i < 35; $i++) {
            WeightLog::factory()->create([
                'user_id' => $user->id,
                'date' => Carbon::today()->subDays(34 - $i), // 今日から過去へ
            ]);
        }
    }
}
