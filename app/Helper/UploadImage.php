<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class UploadImage
{
    public static function upload($file, $path = null)
    {
        if (!$file) {
            throw new \Exception('Upload gagal karena file tidak ditemukan.');
        }

        if (empty($path)) {
            throw new \Exception('Path penyimpanan harus diisi');
        }

        $manager = new ImageManager(new Driver());

        $image = $manager->read($file);

        $encoded = $image->toWebp(80);

        $fileName = pathinfo($file->hashName(), PATHINFO_FILENAME) . '.webp';

        $fullPath = $path . '/' . $fileName;

        Storage::disk('public')->put($fullPath, (string) $encoded);

        return $fullPath;
    }
}
