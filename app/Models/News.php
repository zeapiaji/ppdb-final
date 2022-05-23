<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = "news";
    protected $fillable = ['title','image','content','heading'];

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }


}
