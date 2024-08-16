<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Interfaces\TextMessageInterface;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{

    protected object $message;

    public function __construct(TextMessageInterface $message){
        $this->message = $message;
    }

    public function index(): JsonResponse
    {
        $messages= $this->message->getAllMessages();
        return response()->json([
            'messages' => $messages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request): JsonResponse
    {
        $message = $this->message->storeMessage($request->validated());
        return response()->json([
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, int $id): JsonResponse
    {
        $message = $this->message->updateMessage($request->validated(), $id);
        return response()->json([
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        if($this->message->deleteMessage($id)){
            return response()->json(['message' => 'Message delete successfully']);
        }else{
            return response()->json(['message' => 'Message delete unsuccessfully']);
        }
    }
}
