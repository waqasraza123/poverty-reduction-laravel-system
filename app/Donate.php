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


    public function user(){
        return $this->hasMany('donate', 'donorId', 'id');
    }

}
