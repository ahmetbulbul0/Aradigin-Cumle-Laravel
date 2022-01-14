<?php

namespace App\Models;

use App\Models\CategoriesModel;
use App\Models\CategoryGroupUrlsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryGroupsModel extends Model
{
    use HasFactory;

    protected $table = "category_groups";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "main",
        "sub1",
        "sub2",
        "sub3",
        "sub4",
        "sub5",
        "link_url"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function main()
    {
        return $this->hasOne(CategoriesModel::class, "no", "main")->with("type", "mainCategory");
    }

    public function sub1()
    {
        return $this->hasOne(CategoriesModel::class, "no", "sub1")->with("type", "mainCategory");
    }

    public function sub2()
    {
        return $this->hasOne(CategoriesModel::class, "no", "sub2")->with("type", "mainCategory");
    }

    public function sub3()
    {
        return $this->hasOne(CategoriesModel::class, "no", "sub3")->with("type", "mainCategory");
    }

    public function sub4()
    {
        return $this->hasOne(CategoriesModel::class, "no", "sub4")->with("type", "mainCategory");
    }

    public function sub5()
    {
        return $this->hasOne(CategoriesModel::class, "no", "sub5")->with("type", "mainCategory");
    }
    
    public function linkUrl()
    {
        return $this->hasOne(CategoryGroupUrlsModel::class, "no", "link_url");
    }
}
