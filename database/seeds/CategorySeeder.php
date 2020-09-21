<?php

use Illuminate\Database\Seeder;
use App\Category;
// use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Removes all data and set id number 1.
        Category::truncate();

        $Categories = [
            ['name' => 'Security'],
            ['name' => 'Health & Safety'],
            ['name' => 'Loss Prevention']
        ];
        //Query Builder used for inserting category data.
        DB::table('categories')->insert($Categories);
    }
}
