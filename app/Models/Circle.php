<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Circle extends Shape
{
    use HasFactory;
    protected int $radius;

    public function __construct(int $radius)
    {
     $this->radius = $radius;
    }

    public function getArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function getPerimeter():float
    {
        return 2 * pi() * $this->radius;
    }
}
