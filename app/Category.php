<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['name'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
//    protected $guarded = ['id'];

    /**
     * Get the user that owns the phone.
     */
    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
