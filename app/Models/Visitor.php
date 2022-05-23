<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = "visitor";
    protected $fillable = ['ip', 'news_id'];
    protected $primaryKey = 'visitor_id';

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
