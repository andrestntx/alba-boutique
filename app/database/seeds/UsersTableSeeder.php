<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use boutique\Entities\User;
class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
            'name' => 'Karen Lorena',
            'username' => 'karen',
            'email' => 'karen@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime 
        ]);
	}

}