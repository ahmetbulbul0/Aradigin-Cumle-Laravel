<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class LinkUrlGenerator extends Controller
{
    static function single($text, $limit = NULL)
    {
        $turkishKeys = ["Ç", "ç", "Ğ", "ğ", "ı", "İ", "Ö", "ö", "Ş", "ş", "Ü", "ü", ",", "'", "(", ")", "[", "]", ";", ".", "-", "!", "<", ">", "{", "}", "=", "?", "_", "|", "*", "/", "&", "%", "+", "$", "^", '"'];
        $englishKeys = ["c", "c", "g", "g", "i", "i", "o", "o", "s", "s", "u", "u", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        $linkUrl = str_replace($turkishKeys, $englishKeys, $text);
        if ($limit != NULL) {
            $limit++;
            $linkUrl = explode(" ", $linkUrl, $limit);
            $limit--;
            if (isset($linkUrl[$limit])) {
                unset($linkUrl[$limit]);
            }
        } else if ($limit == NULL) {
            $linkUrl = explode(" ", $linkUrl);
        }
        $linkUrl = implode("-", $linkUrl);
        $linkUrl = strtolower($linkUrl);
        return $linkUrl;
    }
}
