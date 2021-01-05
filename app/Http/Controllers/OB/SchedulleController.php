<?php

namespace App\Http\Controllers\OB;

use App\Http\Controllers\Controller;
use App\Schedulle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isOb');
    }

    public function index()
    {
        return view('pages.ob.jadwal.index', [
            'title' => 'Jadwal',
            'schedulles' => Schedulle::all()
        ]);
    }
}
