<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{   
    protected $guarded = ['id', 'created_at','updated_at'];

    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    
}
