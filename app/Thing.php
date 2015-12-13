<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description', 'location', 'amount'];

    //thing belongs to donate
    public function donate(){
        return $this->belongsTo('Donate', 'thingId', 'id');
    }

}
