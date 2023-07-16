<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // игнорирование полей, которые указаны в массиве при создании поста
    protected $guarded = [];

    // заполняемые поля поста, которые указаны в массиве
    /*
    php artisan tinker
    use App\Models\Post;
    Post::create(['title' => 'Post title', 'excerpt' => 'Post excerpt', 'body' => "This is post's body"]);
    */
    // protected $fillable = ['title', 'excerpt', 'body'];
}
