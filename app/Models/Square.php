<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Square extends Shape
{
    use HasFactory;

    public function getArea(int $side): float
    {
        return pow($side, 2);
    }

    public function getPerimeter(int $side):float
    {
        return $side * 4;
    }
}
