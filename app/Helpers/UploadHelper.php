<?php

namespace App\Helpers;

class UploadHelper{

    public function upload($name, $image, $directory){

        $fileName = $name . time() . '_thumbnail.'. $image->extension();

        $image->storeAs($directory, $fileName, 'public');

        $path = 'storage/' . $directory . $fileName;

        return $path;
    }

    public function remove($filePath){

        $imagePath = public_path($filePath);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

    }
}