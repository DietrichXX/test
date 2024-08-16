<?php

namespace App\Interfaces;

interface NotificationInterface
{
    public function send(string $recipient, string $message): string;
}
