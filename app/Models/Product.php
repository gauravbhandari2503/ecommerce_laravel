<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'created_at','updated_at'];

    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id');
    }
}
