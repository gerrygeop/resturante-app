<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DapurController extends Controller
{
    public function index()
    {
        return view('dapur.index');
    }
}
