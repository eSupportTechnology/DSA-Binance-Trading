<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendTemplateController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.home');
    }
}
