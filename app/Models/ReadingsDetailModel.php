<?php

namespace App\Models;

use App\Models\NewsModel;
use App\Models\VisitorsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadingsDetailModel extends Model
{
    use HasFactory;

    protected $table = "readings_detail";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "visitor_no",
        "time",
        "news_no"
    ];
    
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
        "is_deleted"
    ];

    public function visitorNo()
    {
        return $this->hasOne(VisitorsModel::class, "no", "visitor_no");
    }

    public function newsNo()
    {
        return $this->hasOne(NewsModel::class, "no", "news_no");
    }
}
