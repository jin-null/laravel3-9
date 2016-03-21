<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $fillable = ['name', 'brand_id', 'category_id','thumb','inventory',
        'price','desc', 'onsale','hot','new','recommend', 'sort_order'];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }


    public  function  category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
