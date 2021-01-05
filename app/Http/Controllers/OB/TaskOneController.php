<?php

namespace App\Http\Controllers\OB;

use App\Task;
use App\Verif;
use App\TaskDone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OB\TaskResource;

class TaskOneController extends Controller
{
    public $state = null;

    public function __construct()
    {
        $this->middleware('role:isOb');
    }

    private function setState($state)
    {
        $this->state = $state;
    }

    public function show($state)
    {
        return view('pages.ob.task.index', [
            'title' => 'Data Tugas '. $state,
            'state' => $state
        ]);
    }
    public function index($state)
    {
        return view('pages.ob.task.index', [
            'title' => 'Data Tugas '. $state,
            'state' => $state
        ]);
    }

    public function getData($state)
    {
        $count = 0;
        $now = Carbon::now()->format('Y-m-d');
        $tasks = Task::with(['taskDones' => function($done) use($now){
            $done->whereDate('created_at', $now);
        }])->where('role', $state)->get();

        foreach($tasks as $task){
            if (count($task->taskDones) > 0) {
                $count++;
            }
        }

        $now = Carbon::now()->format('Y-m-d');
        $taskDoneses = TaskDone::whereDate('created_at', '>', $now)->get()->count();
        if ($taskDoneses > 0) {
            $data = [
                'clear_task_today' => $tasks->count(),
                'all_task' => $tasks->count(),
                'data' => TaskResource::collection($tasks)
            ];
        }else{
            $data = [
                'clear_task_today' => $count,
                'all_task' => $tasks->count(),
                'data' => TaskResource::collection($tasks)
            ];
        }
        return $data;
    }

    public function clear(Request $request)
    {
        $arr_input = explode(',', $request->input_checkbox);
        $unique = array_unique($arr_input);
        $diffkeys = array_diff_key($arr_input, $unique);
        $duplicates = array_unique($diffkeys);
        $arr_result = array_diff($arr_input, $duplicates);

        $verif = Verif::create(['role' => $request->state]);
        foreach ($arr_result as $value){
            TaskDone::create([
                'task_id' => $value,
                'verif_id' => $verif->id,
                'user_id' => Auth::user()->id
            ]);
        }
        //Verif::create(['role' => $request->state]);
        return redirect()->route('ob.taks.index', $request->state);
    }
}
