<?php

namespace App\Models;

use App\Models\UsersModel;
use App\Models\ResourceUrlsModel;
use App\Models\CategoryGroupsModel;
use App\Models\ResourcePlatformsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "content",
        "author",
        "category",
        "resource_platform",
        "resource_url",
        "publish_date",
        "write_time",
        "listing",
        "reading",
        "link_url"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function author()
    {
        return $this->hasOne(UsersModel::class, "no", "author")->with("type");
    }

    public function category()
    {
        return $this->hasOne(CategoryGroupsModel::class, "no", "category")->with("main", "sub1", "sub2", "sub3", "sub4", "sub5", "linkUrl");
    }

    public function resourcePlatform()
    {
        return $this->hasOne(ResourcePlatformsModel::class, "no", "resource_platform");
    }

    public function resourceUrl()
    {
        return $this->hasOne(ResourceUrlsModel::class, "no", "resource_url");
    }
}
