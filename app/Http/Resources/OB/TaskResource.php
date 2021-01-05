<?php

namespace App\Http\Resources\OB;

use App\TaskDone;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $now = Carbon::now()->format('Y-m-d');
        $taskDoneses = TaskDone::whereDate('created_at', '>', $now)->get()->count();
        if ($taskDoneses > 0) {
            $status = 'selesai';
            $label = 'success';
        }else{
            $status =  count($this->taskDones) < 1 ? 'belum selesai' : 'selesai';
            $label =  count($this->taskDones) < 1 ? 'danger' : 'success';
        }


        return [
            "id" => $this->id,
            "name" => $this->name,
            "status" => $status,
            "label" => $label,
        ];
    }
}
