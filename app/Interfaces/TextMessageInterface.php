<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface TextMessageInterface
{
    public function storeMessage(array $data): self;
    public function getAllMessages(): Collection;
    public function updateMessage(array $data, int $id): self;
    public function deleteMessage(int $id): bool;
}
