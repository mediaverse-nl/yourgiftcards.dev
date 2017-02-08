<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ordered_product';

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
    public function productkey()
    {
        return $this->belongsTo('App\Productkey');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
