<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends \JeroenZwart\CsvSeeder\CsvSeeder
{
    public function __construct()
    {
        $this->file = 'database/seeds/cssv/movies.csv';
        $this->tablename = 'movies';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
