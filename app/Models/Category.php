<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_categories');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    protected static function boot()
    {
        parent::boot();

        $author_id = authorId();

        static::creating(function ($model) use ($author_id) {
            $model->author_id = $author_id;
        });
    }
}
