<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function list()
    {
        return view('content.list-ujian');
    }
}
