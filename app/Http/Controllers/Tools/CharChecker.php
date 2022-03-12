<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class CharChecker extends Controller
{
    static function allChars($text)
    {
        $turkishKeys = ['Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ",", "'", "(", ")", "[", "]", ";", "'"];
        $englishKeys = ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', "", "", "", "", "", "", "", ""];
        $text = str_replace($turkishKeys, $englishKeys, $text);
        $text = explode(" ", $text);
        $text = implode("-", $text);
        $text = strtolower($text);
        return $text;
    }
    static function specialChars($text)
    {
        $turkishKeys = [",", "'", "(", ")", "[", "]", ";"];
        $englishKeys = ["", "", "", "", "", "", ""];
        $text = str_replace($turkishKeys, $englishKeys, $text);
        $text = explode(" ", $text);
        $text = implode(" ", $text);
        $text = strtolower($text);
        return $text;
    }
}
