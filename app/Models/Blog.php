<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function categories()
    : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, BlogCategory::class);
    }

    public function posts()
    : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    : \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }


    protected static function boot()
    {
        parent::boot();

        $author_id = authorId();

        static::creating(function ($model) use ($author_id) {
            $model->author_id = $author_id;
            $model->slug = static::generateUniqueSlug($model->title);
        });

        static::updating(function ($model) use ($author_id) {
            if ( $model->isDirty('title') ) {
                $model->slug = static::generateUniqueSlug($model->title);
            }
        });
    }

    protected static function generateUniqueSlug($title)
    : string
    {
        $slug = Str::slug($title);

        $count = static::where('slug', $slug)->count();

        if ( $count > 0 ) {
            $suffix = 1;
            do {
                $newSlug = $slug . '-' . $suffix++;
                $count = static::where('slug', $newSlug)->count();
            } while ($count > 0);

            return $newSlug;
        }

        return $slug;
    }
}
