<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;

class DapurController extends Controller
{
    public function index()
    {
        return view('dapur.index');
    }
}
