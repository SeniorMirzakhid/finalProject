<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $movies = DB::table('movie')->get();

        $categories = [];
        $category_id = 62;

        foreach ($movies as $movie) {
            $category = explode("\n", $movie->genres);
            foreach ($category as &$val) {
                if (in_array(['title' => $val], $categories)) {
                    $val = array_search(['title' => $val], $categories);
                } else {
                    $categories[$category_id] = ['title' => $val];
                    $val = $category_id++;
                }
            }

            $attach[] = [
                'movie' => $movie->id,
                'categories' => $category,
            ];
        }
//    \App\Category::query()->insert($categories);

        $i = 0;
        $cats = collect($attach)->pluck('categories');
        \App\Movie::all()->map(function ($movie) use ($cats, $i) {
            $movie->categories()->attach($cats[$i++]);
        });
    }
}
