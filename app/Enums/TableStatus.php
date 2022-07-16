<?php

namespace App\Enums;

enum TableStatus: string
{
   case PENDING = 'pending';
   case AVAILABLE = 'available';
   case UNAVAILABLE = 'unavailable';
}
