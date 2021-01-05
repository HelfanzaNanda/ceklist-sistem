<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    protected $guarded = [];
    //protected $fillable = ['id', 'name', 'role', 'created_at', 'updated_at'];
    //rotected $table = 'tasks';

    public function taskDones()
    {
        return $this->HasMany(TaskDone::class);
    }
}
