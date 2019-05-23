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
        	'name' => 'Teknik Destek Hizmeti Memnuniyeti',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('questions')->insert([
        	'poll_id' => 1,
			'content' => 'Teknik desteğe ulaşmada güçlük yaşıyor musunuz?',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Hayır',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Bazen',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Sıklıkla',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Her zaman',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

    	\DB::table('polls')->insert([
        	'user_id' => 1,
        	'name' =>' Anket Adı 2',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);
		
    	\DB::table('polls')->insert([
        	'user_id' => 2,
        	'name' =>' Anket Adı 3',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);
		
        \DB::table('questions')->insert([
        	'poll_id' => 1,
			'content' => 'Soru 2',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('questions')->insert([
        	'poll_id' => 1,
			'content' => 'Soru 3',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('questions')->insert([
        	'poll_id' => 2,
			'content' => 'Soru 4',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('questions')->insert([
        	'poll_id' => 2,
			'content' => 'Soru 5',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('questions')->insert([
        	'poll_id' => 3,
			'content' => 'Soru 6',
			'isOtherExist' => 0,
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);
		
		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Seçenek 1',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Seçenek 2',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 1,
        	'content' => 'Seçenek 3',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 2,
        	'content' => 'Seçenek 4',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 2,
        	'content' => 'Seçenek 5',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 2,
        	'content' => 'Seçenek 6',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 3,
        	'content' => 'Seçenek 7',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 3,
        	'content' => 'Seçenek 8',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 3,
        	'content' => 'Seçenek 9',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 4,
        	'content' => 'Seçenek 10',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 4,
        	'content' => 'Seçenek 11',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 5,
        	'content' => 'Seçenek 12',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 5,
        	'content' => 'Seçenek 13',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 6,
        	'content' => 'Seçenek 14',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('choices')->insert([
        	'question_id' => 6,
        	'content' => 'Seçenek 15',
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('users')->insert([
        	'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin123'),
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('users')->insert([
        	'name' => 'test',
			'email' => 'test@test.com',
			'password' => bcrypt('test1234'),
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);

		\DB::table('users')->insert([
        	'name' => 'foo',
			'email' => 'foo@foo.com',
			'password' => bcrypt('foo12345'),
        	'created_at' => NOW(),
        	'updated_at' => NOW()
		]);
	}
}
