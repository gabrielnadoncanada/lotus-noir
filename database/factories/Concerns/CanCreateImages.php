<?php

namespace Database\Factories\Concerns;

use Database\Seeders\LocalImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait CanCreateImages
{
    public function createImage(?string $size = LocalImages::SIZE_200x200): ?string
    {
        $image = LocalImages::getRandomFile($size);
        $image = file_get_contents($image->getPathname());
        $filename = Str::uuid() . '.jpg';

        Storage::disk('public')->put($filename, $image);

        return $filename;
    }

    public function createDefaultImage(): ?string
    {
        return Storage::disk('public')->putFile(public_path(config('seeding.image_placeholder_path')));
    }
}
