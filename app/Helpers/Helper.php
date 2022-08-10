<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class  Helper {

    const count_per_page = 15;

    // Static functions
    public static function saveFile($image, $folder_name) {
        if(isset($image) && is_file($image)) {
            $imageName  = Carbon::now()->format('Ymd-His-u') ."-". Str::random(5);
            $imageName  = $imageName .'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('images/'. $folder_name .'/');
            $image->move($destinationPath, $imageName);
            return $imageName;
        }

        return null;
    }
}