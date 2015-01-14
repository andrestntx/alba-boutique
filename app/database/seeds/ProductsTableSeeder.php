<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();
		/*$id = [0, 20531, 22111, 22861, 22881, 22961, 23021, 23041, 23051];

		foreach(range(1, 8) as $index)
		{
			Product::create([
				'ref'			=> $ref[$index],
				'name'			=> $faker->company,
				'description' 	=> $faker->text(200),
				'created_at' 	=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
				'updated_at' 	=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now') 
			]);
			Product::create([
				'id'			=> $id[$index],
				'name'			=> 'hola',
				'description' 	=> 'sdfasfasfdas',
				'created_at' 	=> new DateTime,
				'updated_at' 	=> new DateTime
			]);
		}*/
	}
}