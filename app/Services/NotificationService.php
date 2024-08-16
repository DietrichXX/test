<?php

namespace App\Services;

use App\Interfaces\NotificationInterface;
use App\Interfaces\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    protected object $notification;

    public function __construct(NotificationInterface $notification){
        $this->notification = $notification;
    }

    public function notify(array $data): string
    {
        return $this->notification->send($data['recipient'], $data['message']);
    }
}
