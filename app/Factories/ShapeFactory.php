<?php

namespace App\Factories;

use App\Interfaces\ShapeFactoryInterface;
use App\Models\Shapes\Circle;
use App\Models\Shapes\Rectangle;
use App\Models\Shapes\Square;
use App\Models\Shapes\Shape;

class ShapeFactory implements ShapeFactoryInterface
{
    public function createShape($data): Shape
    {
        return match (true) {
            isset($data['radius']) => new Circle($data['radius']),
            isset($data['width']) && isset($data['height']) => new Rectangle($data['width'], $data['height']),
            isset($data['side']) => new Square($data['side']),
        };
    }
}
