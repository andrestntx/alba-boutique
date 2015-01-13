<?php

class ContactMessage extends Eloquent {

	protected $fillable = ['name', 'email', 'tel', 'text'];
	protected $table = 'contact_messages';

	public $timestamp = true;
}