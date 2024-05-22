<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(100)->create();

        Article::create([
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'technology',
            'slug' => 'technology',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptas earum corporis quod consequatur iusto officia velit, eos ipsam repudiandae a provident, expedita voluptatem odit ratione aspernatur facere delectus quibusdam.',
            'img' => 'default.jpg',
            'views' => 0,
            'status' => 'draft',
            'publish_date' => now(),
        ]);
    }
}
