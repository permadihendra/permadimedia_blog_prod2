<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
    public function uploadImage(array $data, string $oldImage = NULL)
    {
        $file = $data['img'];
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension(); //.jpg, .png, .jpeg
        $originalPath = storage_path() . '/app/public/backend/images/' . $imageName;
        $thumbnailPath = storage_path() . '/app/public/backend/images/thumbnails/' . $imageName;

        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
            mkdir($thumbnailPath, 0777, true);
        }

        // create new manager instance with desired driver
        $intervention = new ImageManager(new Driver());

        // Generate main image
        $intervention->read($file)->scale(width: 900)->toWebp(100)->save($originalPath);
        $intervention->read($file)->scale(width: 900)->toWebp(100)->save($originalPath);

        //Delete Old Image
        if ($oldImage) {
            Storage::delete([
                'public/backend/images/' . $oldImage,
                'public/backend/images/thumbnails' . $oldImage,
            ]);
        }

        $data['img'] = $imageName;

        return $data;
    }
}
