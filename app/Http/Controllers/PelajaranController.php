<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function list()
    {
        return view('content.list-pelajaran');
    }
}
