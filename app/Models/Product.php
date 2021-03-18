<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'supplier_id',
        'mrp',
        'discount',
        'description',
        'stock',
        'best_seller',
        'image'
    ];
    use HasFactory;
}
