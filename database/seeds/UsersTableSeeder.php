<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '山崎浩司',
            'mail' => 'yamazakikoji@example.com',
            'password' => bcrypt('yamazakikoji'),
            'bio' => '初めましてよろしくお願いします。',
        ]);
    }
}
