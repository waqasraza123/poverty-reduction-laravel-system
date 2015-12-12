<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model {

    protected $fillable = ['id', 'name', 'description', 'location', 'amount'];

}
