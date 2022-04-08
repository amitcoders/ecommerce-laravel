<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index(){
        return view('pages.index');
    }
}
