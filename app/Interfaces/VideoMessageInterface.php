<?php

namespace App\Interfaces;

interface VideoMessageInterface
{
    public function uploadVideo(string $videoPath): string;
    public function updateVideo(string $videoPath): string;
    public function deleteVideo(string $videoPath): bool;
}
