<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'tags',
        'category',
        'creator'
    ];

    public function categor()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function user() {
        return $this->belongsTo(User::class, 'creator');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id')->orderByDesc('created_at');
    }
}
