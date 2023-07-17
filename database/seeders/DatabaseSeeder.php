<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis dolores exaliquid nesciunt expedita totam, ut assumenda culpa dicta autem nemo quasi similique maiores placeat perferendis ullam, error aut quo.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'Eloquent is Amazing',
            'slug' => 'eloquent-is-amazing',
            'excerpt' => '<p>Eloquent Laravel</p>',
            'body' => '<p>Laravel includes Eloquent, an object-relational mapper (ORM) that makes it enjoyable to interact with your database. When using Eloquent, each database table has a corresponding "Model" that is used to interact with that table. In addition to retrieving records from the database table, Eloquent models allow you to insert, update, and delete records from the table as well.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'Post title',
            'slug' => 'post-title',
            'excerpt' => '<p>Post excerpt</p>',
            'body' => '<p>This is post\'s body</p>',
        ]);
    }
}
