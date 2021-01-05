<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isAdmin');
    }

    public function dashboard()
    {
        return view('pages.admin.dashbboard', [
            'title' => 'Beranda Admin'
        ]);
    }
}
