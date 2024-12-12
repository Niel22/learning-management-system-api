<?php

namespace App\Helpers;

class UploadHelper{

    public function upload($name, $image, $directory){

        $fileName = $name . '_thumbnail.'. $image->extension();

        $image->move(public_path($directory), $fileName);

        $path = $directory.'/'. $fileName;

        return $path;
    }

    public function remove($filePath){

        $imagePath = public_path($filePath);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

    }
}