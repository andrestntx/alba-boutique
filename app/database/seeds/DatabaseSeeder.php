<?php

use boutique\Entities\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		/* User */
		$this->call('UsersTableSeeder'); 
	}

}
