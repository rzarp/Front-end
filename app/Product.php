<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_category', 'product_id', 'category_id')->withTimestamps();
    }
}
