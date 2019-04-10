<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['expiry_date'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
