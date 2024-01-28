<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function list()
    {
        return view('content.list-guru');
    }
}
