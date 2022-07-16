<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = [
        'reservation_date'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
