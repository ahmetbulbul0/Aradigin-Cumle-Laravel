<?php

namespace App\Models;

use App\Models\VisitorsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingsDetailModel extends Model
{
    use HasFactory;

    protected $table = "listings_detail";

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
        "updated_at"
    ];

    public function visitorNo()
    {
        return $this->hasOne(VisitorsModel::class, "no", "visitor_no");
    }
}
