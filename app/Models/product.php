<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[

        'product_name',
        'product_category',
        'poduct_MRP',
        'poduct_selling_price',
        'variants',
        'description'
    ];
}
