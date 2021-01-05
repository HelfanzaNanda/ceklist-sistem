<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use tidy;

class TaskController extends Controller
{
    public $state = null;

    public function __construct()
    {
        $this->middleware('role:isAdmin');
    }

    private function setState($state)
    {
        $this->state = $state;
    }
    public function index($state)
    {
        return view('pages.admin.task.'. $state .'.index', [
            'title' => 'Data Tugas '. $state,
            'tasks' => Task::where('role', $state)->get()
        ]);
    }

    public function create($state)
    {
        return view('pages.admin.task.'.$state.'.create', [
            'title' => 'Tambah Data Tugas '. $state,
            'task' => new Task,
            'textButton' => 'Tambah'
        ]);
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'role' => $request->state
        ]);

        return redirect()->route('admin.task.index', $request->state)
        ->with('success', 'berhasil menambahkan data');
    }

    public function edit(Task $task)
    {
        return view('pages.admin.task.'.$task->role.'.edit', [
            'title' => 'edit data tugas '. $task->role,
            'task' => $task,
            'textButton' => 'update'
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update([
            'name' => $request->name ?? $task->name,
        ]);
        return redirect()->route('admin.task.index', $task->role)
        ->with('success', 'berhasil update data');
    }

    public function destroy(Task $task)
    {
        $this->setState($task->role);
        $task->delete();
        return redirect()->route('admin.task.index', $this->state)
        ->with('success', 'berhasil delete data');
    }
}
