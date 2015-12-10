<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model {

    /*tell the table name explicitly(no need btw)*/
    protected $table = 'problems';

	protected $fillable = ['name', 'phone', 'address', 'problem', 'cost', 'severity'];

}
