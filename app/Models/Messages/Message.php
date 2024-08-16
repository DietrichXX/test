<?php

namespace App\Models\Messages;

use App\Interfaces\TextMessageInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Message extends Model implements TextMessageInterface
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'text',
    ];

    public function storeMessage(array $data): self
    {
        return self::create($data);
    }

    public function getAllMessages(): Collection
    {
        return self::all();
    }

    public function updateMessage(array $data, int $id): self
    {
        $message = self::findOrFail($id);
        return tap($message)->update($data);
    }

    public function deleteMessage(int $id): bool
    {
        $message = self::findOrFail($id);
        return $message->delete();
    }
}
