<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// create our users table
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email', 128);
			$table->string('password', 64);
			$table->timestamps();
		});

		// insert a default user
		DB::table('users')->insert(array(
			'email'	=> 'admin@thekitchen.co',
			'password'	=> '1812war')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}