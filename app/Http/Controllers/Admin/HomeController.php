<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}
