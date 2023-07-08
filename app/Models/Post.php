<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
        return collect(File::files(resource_path("posts")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(
                fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                )
            );

        // реализация без использования коллекции
        // $posts = array_map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);

        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug,
        //     );
        // }, $files);

        // return $posts;
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
