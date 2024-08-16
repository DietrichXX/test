<?php

namespace App\Interfaces;

interface NotificationServiceInterface
{
    public function notify(array $data): string;
}
