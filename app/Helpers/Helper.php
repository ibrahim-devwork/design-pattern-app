<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class  Helper {

    const count_per_page = 15;

    // Static functions
    public static function saveFile($image, $folder_name) {
        if(isset($image) && is_file($image)) {
            $image      = $image;
            $imageName  = time() . Str::random(5) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/'. $folder_name .'/');
            $image->move($destinationPath, $imageName);
            return $imageName;
        }

        return null;
    }
}