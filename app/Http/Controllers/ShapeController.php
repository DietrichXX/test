<?php

namespace App\Http\Controllers;

use App\Interfaces\ShapeFactoryInterface;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShapeController extends Controller
{
    protected object $shapeFactory;

    public function __construct(ShapeFactoryInterface $shapeFactory){
        $this->shapeFactory = $shapeFactory;
    }

    public function area(Request $request): JsonResponse
    {
        $shape = $this->shapeFactory->createShape($request->all());
        $area = $shape->getArea();

        return response()->json([
            'area' => $area,
            'message' => 'Calculation of area successful',
        ]);
    }

    public function perimeter(Request $request): JsonResponse
    {
        $shape = $this->shapeFactory->createShape($request->all());
        $perimeter = $shape->getPerimeter();

        return response()->json([
            'perimeter' => $perimeter,
            'message' => 'Calculation of perimeter successful',
        ]);
    }
}
