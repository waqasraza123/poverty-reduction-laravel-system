<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model {

	protected $table = 'money';

    protected $fillable = ['name', 'organization', 'email', 'address', 'city', 'state', 'phone', 'amount'];

}
