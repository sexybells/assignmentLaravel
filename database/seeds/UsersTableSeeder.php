<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'Nguyen Duong',
            'dateOfBirth' => Carbon::parse('1998-01-01'),
            'phoneNumber' => '099999999',
            'email' => 'nguyenhaiduong251298@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => '2',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        );
        DB::table('users')->insert($data);
    }
}
