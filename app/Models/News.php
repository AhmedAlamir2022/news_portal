<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function auther()
    {
        return $this->belongsTo(Admin::class);
    }
}
