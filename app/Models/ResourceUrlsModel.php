<?php

namespace App\Models;

use App\Models\NewsModel;
use App\Models\ResourcePlatformsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourceUrlsModel extends Model
{
    use HasFactory;

    protected $table = "resource_urls";

    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "news_no",
        "resource_platform",
        "url"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function newsNo()
    {
        return $this->hasOne(NewsModel::class, "no", "news_no");
    }

    public function resourcePlatform()
    {
        return $this->hasOne(ResourcePlatformsModel::class, "no", "resource_platform");
    }
}