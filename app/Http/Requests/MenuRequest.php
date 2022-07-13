<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $default = 'required';
        if ($request->isMethod('put')) {
            $default = 'nullable';
        }

        return [
            'name' => ['required'],
            'description' => ['required'],
            'image' => [$default, 'image', 'mimes:png,jpg,jpeg'],
            'price' => ['required'],
        ];
    }
}
