<?php

namespace App\Models\Shapes;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rectangle extends Shape
{
    use HasFactory;

    protected int $length;

    protected int $width;

    public function __construct(int $length, int $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea(): float
    {
        return $this->length * $this->width;
    }

    public function getPerimeter():float
    {
        return ($this->length + $this->width) * 2;
    }
}
