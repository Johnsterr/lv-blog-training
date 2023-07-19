<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});

// оставить такую запись и в шаблоне вывода всех постов ссылка линкуется
// на slug, а не на id, тогда в модели Post в функции getRouteKeyName
// нужно указать ссылаться на slug, а не на id
// Route::get('posts/{post}', function (Post $post) {
//     return view('post', [
//         'post' => $post
//     ]);
// });

Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
