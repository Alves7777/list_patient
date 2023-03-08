<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public static function uploadPhoto($images, $imageColumn = null)
    {
        $uploadImages = [];
        if (is_array($images)) {
            foreach ($images as $image) {
                $uploadImages[] = [$imageColumn => $image->store('photos', 'public')];
            }
        } else {
            $uploadImages = $images->store('photos', 'public');
        }
        return $uploadImages;
    }

    public static function removePhoto(string $photo = null): bool
    {
        if (Storage::disk('public')->exists($photo)) {
            Storage::disk('public')->delete($photo);
        }
        return false;
    }

}
