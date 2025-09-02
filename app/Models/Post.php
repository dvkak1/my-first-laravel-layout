<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = ['content'];

    public function tags()
    {
      return $this->belongsToMany(Tag::class, foreignPivotKey: 'posts_id');
    }
}
