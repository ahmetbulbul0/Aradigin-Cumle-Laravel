<?php

namespace App\Models;

use App\Models\CategoryTypesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "name",
        "type",
        "main_category",
        "link_url"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function type()
    {
        return $this->hasOne(CategoryTypesModel::class, "no", "type");
    }

    public function mainCategory()
    {
        return $this->hasOne(CategoriesModel::class, "no", "main_category")->with("type", "mainCategory");
    }

}
