<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeightLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',

            'weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d)?$/'
            ],

            'calories' => [
                'required',
                'numeric'
            ],

            'exercise_time' => [
                'required',
                'regex:/^\d{2}:\d{2}(:\d{2})?$/'
            ],


            'exercise_content' => 'nullable|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '4桁までの数字で入力してください',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',

            'exercise_time.required' => '運動時間を入力してください',
            'exercise_time.regex' => '運動時間は「HH:MM」形式で入力してください',


            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
