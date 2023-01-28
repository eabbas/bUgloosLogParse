<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogFile extends Model
{
    protected $table    = "loninfo";
    protected $fillable = ["service_name", "status_code", "route_name", "method_type", "loged_date"];
}
