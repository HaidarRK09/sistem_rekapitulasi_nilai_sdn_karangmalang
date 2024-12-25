<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmincController extends Controller
{
    function index()
    {
        echo "hallo, selamat datang";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout>></h1>";
    }

    function admin()
    {
        echo "hallo, selamat datang admin";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout>></h1>";
    }

    function walikelas()
    {
        echo "hallo, selamat datang wali kelas";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout>></h1>";
    }

    function siswa()
    {
        echo "hallo, selamat datang siswa";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout>></h1>";
    }

    // function guru()
    // {
    //     echo "hallo, selamat datan guru";
    //     echo "<h1>" . Auth::user()->name . "</h1>";
    //     echo "<a href='/logout'>Logout>></h1>";
    // }
    
}
