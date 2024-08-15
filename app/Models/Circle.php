<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Circle extends Shape
{
    use HasFactory;

    public function getArea(int $side): float
    {
        return pi() * pow($side, 2);
    }

    public function getPerimeter(int $side):float
    {
        return 2 * pi() * $side;
    }
}
