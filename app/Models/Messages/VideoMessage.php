<?php

namespace App\Models\Messages;

use App\Interfaces\VideoMessageInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoMessage extends Message implements VideoMessageInterface
{
    use HasFactory;

    protected $fillable = [
        'text',
        'video',
    ];

    public function storeMessage(array $data): self
    {
        return self::create([
            'text' => $data['text'],
            'video' => $this->uploadVideo($data['video']),
        ]);
    }

    public function updateMessage(array $data, int $id): self
    {
        $message = self::findOrFail($id);
        $data['video'] = $this->updateVideo($data['video']);
        return tap($message)->update($data);
    }

    public function deleteMessage(int $id): bool
    {
        $message = self::findOrFail($id);
        $this->deleteVideo($message->video);
        return $message->delete();
    }

    public function uploadVideo(string $videoPath): string
    {
        //upload video logic
        return $videoPath;
    }

    public function updateVideo(string $videoPath): string
    {
        //update video logic
        return $videoPath;
    }

    public function deleteVideo(string $videoPath): bool
    {
        //delete video logic
        return true;
    }
}
