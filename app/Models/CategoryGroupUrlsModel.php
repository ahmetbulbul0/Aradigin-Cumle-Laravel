<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGroupUrlsModel extends Model
{
    use HasFactory;

    protected $table = "category_group_urls";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "group_no",
        "link_url"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function groupNo()
    {
        return $this->hasOne(CategoryGroupsModel::class, "no", "group_no")->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "link_url"); // XRAY_TEST (linkUrl)
    }
}
