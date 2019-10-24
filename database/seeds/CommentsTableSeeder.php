<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'post_id' => '1',
            'content' => 'This is post created by seed.',
            'user_id' => '1',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        );
        DB::table('comments')->insert($data);
    }
}
