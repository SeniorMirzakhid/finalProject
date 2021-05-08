<?php

use Illuminate\Support\Facades\DB;
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

   $trend_movies = DB::select("select getMovieByCategory('Fantasy') as value from dual");
    $popular_movies = DB::select("select getMovieByRating('Comedy',5) as value from dual");
    $recently_movies = DB::select("select RecentlyAdded('Family') as value from dual");
    $columbia_pictures = DB::select("select CompanyName('Fantasy','Disney') as value from dual");
    $movies = \App\Movie::query()->orderBy("imdb_rating", "asc")->limit(5)->get();
    return view('welcome', compact('trend_movies', 'popular_movies','movies','columbia_pictures', 'recently_movies'));
});

Route::get('categories', function () {
    $movies = \App\Movie::query()->orderBy("imdb_rating", "asc")->limit(5)->get();
    $cat_movies = \App\Movie::query()->when(request('search'), function ($query, $search) {
        $query->where('title', 'LIKE', "%".$search."%");
    })->when(request('sort'), function ($query, $sort) {
        switch ($sort){
            case 'name':
                $query->orderBy('TITLE');
                break;
            case 'year':
                $query->orderBy('YEAR');
                break;
            case 'budget':
                $query->orderBy('WORLDWIDE_GROSS');
                break;
            case 'rating':
                $query->orderBy('IMDB_RATING','desc');
                break;
        }
    } )->paginate(12);

    return view('categories', compact('movies', 'cat_movies'));
})->name('categories.index');

Route::get('categories/{category}', function ($category) {
    return view('categories.show');
})->name('categories.show');

Route::get('api', function () {
    $item = DB::select("select getMovieByCategory('Fantasy') as value from dual");
    return $item;
});



Route::get('test', function () {
   $movies = \App\Movie::all();
    

    $categories = [];
    $category_id = 1;

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
    \App\Category::query()->insert($categories);
    $i = 0;
    $cats = collect($attach)->pluck('categories');
    foreach($movies as $movie) {
        $movie->categories()->attach($cats[$i++]);
    }
    return $movie->categories;
    
});


 