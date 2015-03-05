<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => 'Dan',
			'password' => Hash::make('123123')
		]);
	}
}