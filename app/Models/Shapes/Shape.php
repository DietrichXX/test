<?php

namespace App\Models\Shapes;

use Illuminate\Database\Eloquent\Model;

abstract class Shape extends Model
{
    abstract public function getArea(): float;

    abstract public function getPerimeter(): float;
}
