<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function convertImageToBase64($path)
    {
        if (Storage::exists($path)) {
            $imageContent = Storage::get($path);
            $base64 = base64_encode($imageContent);
            $mimeType = Storage::mimeType($path);
            return 'data:' . $mimeType . ';base64,' . $base64;
        }
        return null; // Handle the case where the file doesn't exist
    }
}
