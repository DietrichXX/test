<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalProduct extends Product
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'download_link',
    ];
}
