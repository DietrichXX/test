<?php

namespace App\Http\Controllers;

use App\Models\Shape;

class ShapeController extends Controller
{
    protected object $shape;

    public function __construct(Shape $shape){
        $this->shape = $shape;
    }

    public function area()
    {
        $area = $this->shape->getArea();

        return response()->json([
            'area' => $area,
            'message' => 'Calculation of area successful',
        ]);
    }

    public function perimeter()
    {
        $perimeter = $this->shape->getPerimeter();

        return response()->json([
            'perimeter' => $perimeter,
            'message' => 'Calculation of perimeter successful',
        ]);
    }
}
