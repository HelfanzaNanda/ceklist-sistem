<?php

namespace App\Http\Controllers\Admin;

use App\Verif;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaskDone;

class VerifController extends Controller
{
    public $state = null;

    public function __construct()
    {
        $this->middleware('role:isAdmin');
    }

    public function index($state)
    {
        return view('pages.admin.verif.'. $state .'.index', [
            'title' => 'Data Verifikasi '. $state,
            'datas' => Verif::where('role', $state)->get()
        ]);
    }

    public function pdf($state, $id)
    {
        $verif = Verif::findOrfail($id);
        $taskResults = TaskDone::whereDate('created_at', $verif->created_at)
        ->where('verif_id', $id)
        ->get();
        // return view('pages.admin.verif.pdf', [
        //     'verif' => $verif,
        //     'taskResults' => $taskResults
        // ]);
        $pdf = PDF::loadview('pages.admin.verif.pdf',[
            'verif' => $verif,
            'taskResults' => $taskResults
        ]);
        return $pdf->download('laporan - '.$state. '.pdf');
    }


}
