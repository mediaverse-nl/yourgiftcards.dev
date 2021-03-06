<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productkey extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productkey';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the phone record associated with the user.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderedProduct()
    {
        return $this->hasOne('App\OrderedProduct');
    }

}
