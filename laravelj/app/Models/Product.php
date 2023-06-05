<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    #Many To One
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function shopcart(){
        return $this->hasMany(ShopCart::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class);
    }
}
