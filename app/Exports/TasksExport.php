<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class TasksExport implements FromCollection
{
    protected object $tasks;

    public function __construct(Collection $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::all();
    }
}
