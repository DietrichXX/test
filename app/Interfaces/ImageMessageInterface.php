<?php

namespace App\Interfaces;

interface ImageMessageInterface
{
    public function uploadImage(string $imgPath): string;
    public function updateImage(string $imgPath): string;
    public function deleteImage(string $imgPath): bool;
}
