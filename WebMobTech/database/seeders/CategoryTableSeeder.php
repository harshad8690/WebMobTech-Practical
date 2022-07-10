<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $category = new Category();
        $category->name = "Personal";
        $category->save();

        $category = new Category();
        $category->name = "Business/corporate";
        $category->save();

        $category = new Category();
        $category->name = "Fashion";
        $category->save();

        $category = new Category();
        $category->name = "Lifestyle";
        $category->save();
        
        $category = new Category();
        $category->name = "Travel";
        $category->save();

        $category = new Category();
        $category->name = "Food";
        $category->save();

        $category = new Category();
        $category->name = "Movie";
        $category->save();

        $category = new Category();
        $category->name = "Sports";
        $category->save();

        $category = new Category();
        $category->name = "News";
        $category->save();
    }
}
