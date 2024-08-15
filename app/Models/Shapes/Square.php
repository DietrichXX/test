<?php

namespace App\Models\Shapes;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Square extends Rectangle
{
    use HasFactory;

    protected int $side;

    public function __construct(int $side)
    {
        parent::__construct($side, $side);
    }
}
