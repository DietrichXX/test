<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Interfaces\ExportCSVActionInterface;
use App\Interfaces\SearchServiceInterface;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TaskController extends Controller
{
    protected object $taskService;
    protected object $taskSearchService;

    public function __construct(TaskService $taskService, SearchServiceInterface $taskSearchService){
        $this->taskService = $taskService;
        $this->taskSearchService = $taskSearchService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tasks = $this->taskService->getAll();
        return response()->json([
            'tasks' => $tasks,
            'message' => 'All tasks get successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->taskService->store($request->validated());
        return response()->json([
            'task' => $task,
            'message' => 'Task store successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id): JsonResponse
    {
        $task = $this->taskService->update($request->validated(), $id);
        return response()->json([
            'task' => $task,
            'message' => 'Task update successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        if($this->taskService->delete($id)){
            return response()->json(['message' => 'Task delete successfully']);
        }else{
            return response()->json(['message' => 'Task delete unsuccessfully']);
        }
    }

    public function search(Request $request): JsonResponse
    {
        $tasks = $this->taskSearchService->scopeSearch($request->query('keyword'));
        return response()->json([
            'tasks' => $tasks,
            'message' => 'Search successfully',
        ]);
    }

    public function export(ExportCSVActionInterface $exportTasksToCSV): BinaryFileResponse
    {
        $tasks = $this->taskService->getAll();
        return $exportTasksToCSV($tasks);
    }
}
