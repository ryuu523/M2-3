<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispatche extends Model
{
    protected $fillable=["event_id","worker_id","approval","memo"];
}
