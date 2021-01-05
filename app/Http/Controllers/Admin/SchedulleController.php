<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchedulleRequest;
use App\Schedulle;
use Illuminate\Http\Request;

class SchedulleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isAdmin');
    }

    public function index()
    {
        return view('pages.admin.jadwal.index', [
            'title' => 'Jadwal',
            'schedulles' => Schedulle::all()
        ]);
    }

    public function create()
    {
        return view('pages.admin.jadwal.create', [
            'title' => 'Tambah Data Jadwal',
            'schedulle' => new Schedulle,
            'textButton' => 'Tambah'
        ]);
    }

    public function store(SchedulleRequest $request)
    {
        Schedulle::create([
            'day' => $request->day,
            'name_ob' => $request->name_ob,
            'working_hour' => $request->working_hour,
            'break' => $request->break,
            'home_hour' => $request->home_hour
        ]);

        return redirect()->route('admin.schedulle.index')
        ->with('success', 'Data Berhasil Ditambah');
    }

    public function edit(Schedulle $schedulle)
    {
        return view('pages.admin.jadwal.edit', [
            'title' => 'Edit Edit Jadwal',
            'schedulle' => $schedulle,
            'textButton' => 'Update'
        ]);
    }

    public function update(SchedulleRequest $request, Schedulle $schedulle)
    {
        $schedulle->update([
            'day' => $request->day,
            'name_ob' => $request->name_ob,
            'working_hour' => $request->working_hour,
            'break' => $request->break,
            'home_hour' => $request->home_hour
        ]);

        return redirect()->route('admin.schedulle.index')
        ->with('success', 'Data Berhasil Di Update');
    }

    public function destroy(Schedulle $schedulle)
    {
        $schedulle->delete();
        return redirect()->route('admin.schedulle.index')
        ->with('success', 'Data Berhasil Di Delete');
    }
}
