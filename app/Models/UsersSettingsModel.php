<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersSettingsModel extends Model
{
    use HasFactory;

    protected $table = "users_settings";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "user_no",
        "website_theme",
        "dashboard_theme"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function userNo()
    {
        return $this->hasOne(UsersModel::class, "no", "user_no");
    }
}
