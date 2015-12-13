<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'money';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'organization', 'email', 'address', 'city', 'state', 'phone', 'amount'];

    //money belongs to donate
    public function donate(){
        return $this->belongsTo('Donate', 'moneyId', 'id');
    }

}
