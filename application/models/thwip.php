<?php

class Thwip extends Eloquent
{

	// our post object will belong to an author
	//
	// lets create a belongs_to relationship on the
	// author_id field
	public function user()
	{
		return $this->belongs_to('User');
	}
}