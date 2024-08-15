<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhysicalProduct extends Product
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'weight',
    ];
}
