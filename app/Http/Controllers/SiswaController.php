<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function list()
    {
        return view ('content.list-siswa');
    }
}
