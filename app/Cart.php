<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id','qty','price','user_ip'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
