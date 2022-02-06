<?php

namespace App\Models;

use App\Models\UserTypesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = "users";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "full_name",
        "username",
        "password",
        "type",
        "settings"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function type()
    {
        return $this->hasOne(UserTypesModel::class, "no", "type");
    }
}
