<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{

    public function index()
    {
        // $title = "Welcome to SBMS ";
        return view ('auth.login');
    }


    public function about()
    {
        return view ('pages.about');
    }
    public function redirect()
    {
        return view ('auth.login');
    }


}
