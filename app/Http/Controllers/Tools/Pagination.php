<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pagination extends Controller
{
    static function TotalPageNumber($dataNumber, $itemPerPage)
    {
        $totalPageNumber = 1;

        if ($dataNumber > $itemPerPage) {
            $totalPageNumber = intval($dataNumber / $itemPerPage);

            if (($dataNumber % $itemPerPage) > 0) {
                $totalPageNumber++;
            }
        }

        return $totalPageNumber;
    }
}
