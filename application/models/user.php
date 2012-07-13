<?php

class User extends Eloquent
{

	// a user can have many thwips

	public function thwips()
	{
		return $this->has_many('Thwip');
	}
}