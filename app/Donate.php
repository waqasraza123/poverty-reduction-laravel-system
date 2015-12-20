<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'donate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'donorId', 'amount', 'things'];


    //Donate belongs to user
    public function user(){
        return $this->belongsTo('App\User', 'donorId', 'id');
    }

    //donate has things
    public function thing(){
        return $this->hasMany('App\Thing', 'thingId', 'id');
    }

    //donate has money
    public function money(){
        return $this->hasMany('App\Money', 'moneyId', 'id');
    }
}
