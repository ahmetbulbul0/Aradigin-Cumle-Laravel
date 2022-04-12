<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorFooterDataGet extends Controller
{
    static function get()
    {
        $data = [
            "authors" => UsersListController::getAllDataOnlyNotDeletedDatasAllRelationShipsWhereTypeAuthor(),
            "editors" => NULL
        ];
        
        return $data;
    }
}
