<?php

class Product extends Eloquent {
	protected $fillable = ['ref', 'name', 'description', 'size'];

	public function getImageAttribute()
	{
		return URL::to('img/products/' . $this->ref . '.jpg');
	}

	public function getShortNameAttribute()
	{
		return substr($this->name, 0, 15);
	}
}