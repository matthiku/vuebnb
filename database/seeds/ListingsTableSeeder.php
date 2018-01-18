<?php

use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get the seed date from a local file
        $path = base_path() . '/database/data.json';
        $file = File::get($path);
        $data = json_decode($file, true);
        // insert the data into the DB, table listings
        DB::table('listings')->insert($data);
    }
}
