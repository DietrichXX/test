<?php

namespace App\Models\Notifications;

use App\Interfaces\NotificationInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailNotification extends Model implements NotificationInterface
{
    use HasFactory;

    public function send(string $recipient, string $message): string
    {
        return "Sending email to $recipient: $message";
    }
}
