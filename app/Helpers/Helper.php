<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function getImage(string $string): string
    {
        return Storage::disk('s3')->url($string);
    }
}
