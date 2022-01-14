<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypesModel extends Model
{
    use HasFactory;

    protected $table = "user_types";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "name"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];
}
