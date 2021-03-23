<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'quantity',
        'amount',
        'payment_id',
        'price_per_piece',
        'status',
        'shipped_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function statuses(){
        return $this->belongsToMany(Status::class);
    }
    
}
