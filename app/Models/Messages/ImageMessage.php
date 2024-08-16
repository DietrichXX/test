<?php

namespace App\Models\Messages;

use App\Interfaces\ImageMessageInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageMessage extends Message implements ImageMessageInterface
{
    use HasFactory;

    protected $fillable = [
        'text',
        'image',
    ];

    public function storeMessage(array $data): self
    {
        return self::create([
            'text' => $data['text'],
            'image' => $this->uploadImage($data['image']),
        ]);
    }

    public function updateMessage(array $data, int $id): self
    {
        $message = self::findOrFail($id);
        $data['image'] = $this->updateImage($data['image']);
        return tap($message)->update($data);
    }

    public function deleteMessage(int $id): bool
    {
        $message = self::findOrFail($id);
        $this->deleteImage($message->image);
        return $message->delete();
    }

    public function uploadImage(string $imgPath): string
    {
        //upload image logic
        return $imgPath;
    }

    public function updateImage(string $imgPath): string
    {
        //update image logic
        return $imgPath;
    }

    public function deleteImage(string $imgPath): bool
    {
        //delete image logic
        return true;
    }
}
