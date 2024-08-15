<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rectangle extends Shape
{
    use HasFactory;

    protected int $oppositeSide;

    public function getArea(int $side): float
    {
        return $this->oppositeSide * $side;
    }

    public function getPerimeter(int $side): float
    {
        return ($this->oppositeSide + $side) * 2;
    }

    public function setOppositeSide(int $side): void
    {
        $this->oppositeSide = $side;
    }
}
