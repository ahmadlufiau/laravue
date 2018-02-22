<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model {
	//Disable timestamps laravel
	public $timestamps = false;

	//name table
	protected $table = 'ruangan';

	//field table
	protected $fillable = [
		'namaruangan',
	];
}
