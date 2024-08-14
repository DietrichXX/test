<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function getAll(): Collection
    {
        return Task::all();
    }

    public function create(array $data): Task
    {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }

    public function update(array $data, int $id): Task
    {
        $task = Task::findOrFail($id);
        return tap($task)->update($data);
    }

    public function delete(int $id): bool
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
}
