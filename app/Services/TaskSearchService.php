<?php

namespace App\Services;

use App\Interfaces\SearchServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskSearchService implements SearchServiceInterface
{
    public function scopeSearch(string $keyword): Collection
    {
        return DB::table('tasks')
            ->whereAny([
                'title',
                'description',
            ], 'LIKE', "%{$keyword}%")->get();
    }
}
