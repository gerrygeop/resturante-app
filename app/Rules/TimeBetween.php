<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        $open = Carbon::createFromTimeString('17:00:00');
        $close = Carbon::createFromTimeString('23:00:00');

        return $pickupTime->between($open, $close) ? true : false;
    }

    public function message()
    {
        return 'Please choose the time between 17:00 - 23:00.';
    }
}
