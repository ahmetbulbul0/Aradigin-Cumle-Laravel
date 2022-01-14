<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritingsModel extends Model
{
    use HasFactory;

    protected $table = "writings";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "time_start",
        "time_finish",
        "number"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];
}
