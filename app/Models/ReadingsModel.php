<?php

namespace App\Models;

use App\Models\NewsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadingsModel extends Model
{
    use HasFactory;

    protected $table = "readings";
    
    protected $primaryKey = "no";

    protected $fillable = [
        "no",
        "time_start",
        "time_finish",
        "news_no",
        "number"
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
}
