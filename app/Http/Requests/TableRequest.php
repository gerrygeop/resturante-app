<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'guest_number' => ['required'],
            'status' => ['required', 'string'],
            'location' => ['required', 'string'],
        ];
    }
}
