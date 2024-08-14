<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ExportCSVActionInterface
{
    public function __invoke(Collection $data): BinaryFileResponse;
}
