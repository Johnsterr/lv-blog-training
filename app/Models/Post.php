<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        // через вспомогательный класс File читаем все файлы из директории resources/posts/
        // и создаем массив
        $files = File::files(resource_path("posts/"));

        // через колбэк получаем контент файлов в массиве и возвращаем новый массив с этим контентом
        return array_map(fn ($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        // resource_path - хелпер для пути до resources
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // cache - при обновлении страницы контент будет отдаваться из кеша после первого рендера в браузер
        // после 1200 секунд, если клиент обновит страницу, будет рендер и снова начнется отсчет для кеша
        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
    }
}
