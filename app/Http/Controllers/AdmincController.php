<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmincController extends Controller
{
    function index()
    {
        return view('admin.dashboard', ['user' => Auth::user()]);
    }
}
