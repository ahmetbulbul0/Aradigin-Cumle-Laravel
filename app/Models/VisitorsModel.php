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
        "browser",
        "last_login_time",
        "website_theme",
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at"
    ];
}
