<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedTo extends Model
{
    use HasFactory;

    protected $fillable = ['employee_code', 'task_id'];
}
