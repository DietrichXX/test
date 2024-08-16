<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Interfaces\NotificationServiceInterface;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    protected object $notificationService;

    public function __construct(NotificationServiceInterface $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function store(NotificationRequest $request): JsonResponse
    {
        return response()->json([
            'notification' => $this->notificationService->notify($request->validated())
        ]);
    }
}
