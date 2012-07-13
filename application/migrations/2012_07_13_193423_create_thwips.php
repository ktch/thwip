<?php

class Create_Thwips {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('thwips', function($table) {
			$table->increments('id');
			$table->string('dest');
			$table->string('title', 128);
			$table->integer('hits');
			$table->integer('user_id');
			$table->timestamps();
		});

		DB::table('thwips')->insert(array(
			'dest'	=> 'http://thekitchen.co',
			'title'	=> 'the Kitchen',
			'user_id' => 1
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('thwips');
	}

}