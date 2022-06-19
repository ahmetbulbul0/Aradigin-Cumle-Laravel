<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListTypeGenerator extends Controller
{
    static function listTypeGenerateWithNames($names)
    {
        foreach ($names as $name) {
            if (Str::endsWith($name, "09")) {
                $listTypes[] = [
                    "list_type" => $name,
                    "column" => Str::remove('09', $name),
                    "sorting" => "ASC"
                ];
            }
            if (Str::endsWith($name, "90")) {
                $listTypes[] = [
                    "list_type" => $name,
                    "column" => Str::remove('90', $name),
                    "sorting" => "DESC"
                ];
            }
            if (Str::endsWith($name, "AZ")) {
                $listTypes[] = [
                    "list_type" => $name,
                    "column" => Str::remove('AZ', $name),
                    "sorting" => "ASC"
                ];
            }
            if (Str::endsWith($name, "ZA")) {
                $listTypes[] = [
                    "list_type" => $name,
                    "column" => Str::remove('ZA', $name),
                    "sorting" => "DESC"
                ];
            }
        }

        return $listTypes;
    }
}
