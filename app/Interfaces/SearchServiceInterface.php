<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface SearchServiceInterface
{
    public function scopeSearch(string $keyword): Collection;
}
