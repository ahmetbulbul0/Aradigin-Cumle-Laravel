<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  ResourcePlatformsModel extends Model
{
    use HasFactory;

    protected $table = "resource_platforms";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "name",
        "main_url",
        "link_url"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];
}
