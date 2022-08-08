<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function scopeFilter($query, $data) {

        return $query->where('title', 'like', "%{$data['title']}%");
    }
}
