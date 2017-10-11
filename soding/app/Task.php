<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model{

	protected $table = 'tasks';

	protected $fillable = array(
	    'name',
	    'description',
	    'dateCreated',
	    'dateUpdated'
	);

	
    public $timestamps = false;

}