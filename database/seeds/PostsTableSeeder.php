<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'title' => 'First post created by seeder',
            'content' => 'This is body of first body.',
            'category_id' => '1',
            'user_id' => '1',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        );
        DB::table('posts')->insert($data);
    }
}
