<?php

use Illuminate\Database\Seeder;
use App\Comic;
class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');

        foreach($comics as $comic) {

            $formato = new Comic();
            $formato->title = $comic['title'];
            $formato->description = $comic['description'];
            $formato->thumb = $comic['thumb'];
            $formato->price = $comic['price'];
            $formato->series = $comic['series'];
            $formato->sale_date = $comic['sale_date'];
            $formato->type = $comic['type'];
            $formato->save();
        }
    }
}
