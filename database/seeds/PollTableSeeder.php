<?php

use Illuminate\Database\Seeder;

class PollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('polls')->insert([
        	'user_id' => 1,
        	'name' =>' 34000',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
        ]);
    	\DB::table('polls')->insert([
        	'user_id' => 1,
        	'name' =>' 7000',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
        ]);
    	\DB::table('polls')->insert([
        	'user_id' => 2,
        	'name' =>' 92000',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
        ]);
    	\DB::table('polls')->insert([
        	'user_id' => 2,
        	'name' =>' 54000',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
        ]);
        \DB::table('polls')->insert([
        	'user_id' => 3,
        	'name' =>'52000',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
        ]);
    }
}
