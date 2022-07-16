<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'telp' => ['required'],
            'reservation_date' => ['required'],
            'table_id' => ['required'],
            'guest_number' => ['required'],
        ];
    }
}
