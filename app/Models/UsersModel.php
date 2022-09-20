<?php

namespace App\Models;

use App\Models\UserTypesModel;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function settings()
    {
        return $this->hasOne(UsersSettingsModel::class, "no", "settings");
    }
}
