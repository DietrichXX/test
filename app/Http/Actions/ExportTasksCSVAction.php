<?php

namespace App\Http\Actions;

use App\Exports\TasksExport;
use App\Interfaces\ExportCSVActionInterface;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportTasksCSVAction implements ExportCSVActionInterface
{
    public function __invoke(Collection $data): BinaryFileResponse
    {
        return Excel::download(new TasksExport($data), 'tasks.csv');
    }
}
