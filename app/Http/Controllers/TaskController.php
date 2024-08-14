<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected object $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
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
        $task = $this->taskService->create($request->validated());
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
}
