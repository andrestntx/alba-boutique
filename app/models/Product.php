<?php

class Product extends Eloquent {

	protected $primaryKey = 'ref';
	protected $fillable = ['ref', 'name', 'description', 'size'];
	protected $autoincrements = false;

	public function getImageAttribute()
	{
		return URL::to('img/products/' . $this->ref . '.jpg');
	}

	public function getShortNameAttribute()
	{
		return substr($this->name, 0, 15);
	}
}