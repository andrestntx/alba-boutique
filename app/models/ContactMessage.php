<?php

class ContactMessage extends Eloquent {

	protected $fillable = ['name', 'email', 'tel', 'text'];
	protected $table = 'contact_messages';

	public $timestamp = true;

	public function getCreatedAtForHumansAttribute()
    {
       return $this->created_at;
    }

}