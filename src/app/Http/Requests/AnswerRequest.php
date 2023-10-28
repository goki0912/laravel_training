<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname'=>'required|string|max:200',
            'gender'=>'required|in:1,2',
            'age'=>'required|exists:ages,id',
            'mail'=>'required|email',
            'feedback'=>'nullable|string',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.required' => '氏名は必須です。',
            'gender.required' => '性別を選択してください。',
            'gender.in' => '性別の値が無効です。',
            'age.required' => '年代を選択してください',
            'age.exists' => '選択した年代が無効です。',
            'mail.required'=>'メールアドレスは必須です'
            // 他のエラーメッセージ
        ];
    }
}
