<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'Default Category',
            'user_id' => '1',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        );
        DB::table('categories')->insert($data);
    }
}
