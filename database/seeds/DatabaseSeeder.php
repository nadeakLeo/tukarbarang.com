<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_user')->insert(array(
        	'username' => 'admin',
        	'password' => '123'
        ));

        DB::table('terms')->insert(array(
            'terms' => null,
        ));
    }
}
