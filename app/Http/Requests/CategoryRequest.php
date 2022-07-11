<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $image = 'required';
        if ($request->isMethod('put')) {
            $image = 'nullable';
        }

        return [
            'name' => ['required'],
            'description' => ['required'],
            'image' => [$image, 'image'],
        ];
    }
}
