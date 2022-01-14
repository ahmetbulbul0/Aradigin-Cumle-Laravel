<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorsModel extends Model
{
    use HasFactory;

    protected $table = "visitors";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "ip",
        "other"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];
}
