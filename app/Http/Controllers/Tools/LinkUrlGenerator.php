<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class LinkUrlGenerator extends Controller
{
    static function single($text) {
        $turkishKeys = ['Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ",", "'", "(", ")", "[", "]", ";"];
        $englishKeys = ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', "", "", "", "", "", "", ""];
        $linkUrl = str_replace($turkishKeys, $englishKeys, $text);
        $linkUrl = explode(" ", $linkUrl);
        $linkUrl = implode("-", $linkUrl);
        $linkUrl = strtolower($linkUrl);
        return $linkUrl;
    }
}
