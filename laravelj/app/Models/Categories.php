<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    #One To Many
    public function products(){
        return $this->hasMany(Product::class);
    }

    #One To Many Inverse
    public function parent(){
        return $this->belongsTo(Categories::class,'parent_id');
    }
    #One To Many
    public function children(){
        return $this->hasMany(Categories::class,'parent_id');
    }
}
