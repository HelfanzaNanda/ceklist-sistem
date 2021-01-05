<?php

namespace App\Http\Controllers\OB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isOb');
    }

    public function dashboard()
    {
        return view('pages.ob.dashboard', [
            'title' => 'Beranda OB'
        ]);
    }
}
