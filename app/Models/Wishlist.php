<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{   
    protected $fillable = [
        'customer_id',
        'product_id',
    ];
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class,'id');
    }
}
