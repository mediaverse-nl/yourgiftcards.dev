<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orderdetail';

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
//    protected $fillable = [];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['order_id', 'product_id'];

    /**
     * Get the phone record associated with the user.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

}
