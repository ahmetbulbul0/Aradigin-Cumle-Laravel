<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantsModel extends Model
{
    use HasFactory;

    protected $table = "constants";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "key",
        "value"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];
}
