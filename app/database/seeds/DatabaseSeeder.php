<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->insert(array(
            'name' => 'Andrés Mauricio Pinzón',
            'username' => 'andrestntx',
            'email' => 'andres@gmail.com',
            'password' => '123',
            'created_at' => new DateTime,
            'updated_at' => new DateTime 
        ));
    }
}

