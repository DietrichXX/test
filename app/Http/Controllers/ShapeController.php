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
        $sideA = 5;
        $sideB = 6;
        $this->shape->setOppositeSide($sideB);

        $area = $this->shape->getArea($sideA);
        return response()->json([
            'area' => $area,
            'message' => 'Calculation of area successful',
        ]);
    }

    public function perimeter()
    {
        $sideA = 5;
        $sideB = 6;
        $this->shape->setOppositeSide($sideB);

        $perimeter = $this->shape->getPerimeter($sideA);
        return response()->json([
            'perimeter' => $perimeter,
            'message' => 'Calculation of perimeter successful',
        ]);
    }
}
