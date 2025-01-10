<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningTextModels extends Model
{
    protected $table = 'running_text';
    protected $fillable = ['id', 'running_text', 'created_at', 'updated_at'];
}
