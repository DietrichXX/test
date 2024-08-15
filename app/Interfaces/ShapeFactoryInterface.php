<?php

namespace App\Interfaces;

use App\Models\Shapes\Shape;

interface ShapeFactoryInterface
{
    public function createShape($data): Shape;
}
