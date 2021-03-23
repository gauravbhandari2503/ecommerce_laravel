<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'mrp',
        'discount',
        'description',
        'stock',
        'best_seller',
        'image',
        'category_id',
    ];
    use HasFactory;
    
}
