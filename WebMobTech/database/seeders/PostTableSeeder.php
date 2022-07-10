<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $now = Carbon::now('utc')->toDateTimeString();

        $category = Category::get()->toArray();
        $categoryName = array_column($category, 'name');
        for( $i=0; $i<4; $i++ ) {
            $key = array_rand($categoryName);
            $data = [
                'title'    => ucfirst($faker->word),
                'content'  => $faker->sentence,
            ];

            $postBlog = Post::create($data);
            if($postBlog){
                $postBlog->categories()->sync($key);
            }
        }
    }
}
