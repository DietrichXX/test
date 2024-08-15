<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Shape extends Model
{
    use HasFactory;

    abstract public function getArea(int $side): float;

    abstract public function getPerimeter(int $side): float;

}
