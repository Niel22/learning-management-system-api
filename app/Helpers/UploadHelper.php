<?php

namespace App\Helpers;

class UploadHelper{

    public function upload($name, $file, $directory){

        $fileName = $name . time() . $file->extension();

        $file->storeAs($directory, $fileName, 'public');

        $path = 'storage/' . $directory . $fileName;

        return $path;
    }

    public function remove($filePath){

        $file_Path = public_path($filePath);

        if(file_exists($file_Path)){
            unlink($file_Path);
        }

    }
}