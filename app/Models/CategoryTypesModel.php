<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTypesModel extends Model
{
    use HasFactory;

    protected $table = "category_types";
    
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