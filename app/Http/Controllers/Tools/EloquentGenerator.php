<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EloquentGenerator extends Controller
{
    static function whereGenerateByIsDeleted($request, $model)
    {
        switch ($request->is_deleted) {
            case true:
                $model = $model->where("is_deleted", true);
                break;
            case false:
                $model = $model->where("is_deleted", false);
                break;
            default:
                $model = $model->where("is_deleted", false);
                break;
        }

        return $model;
    }

    static function whereGenerateByColumn($request, $model, $keyword, $type)
    {
        if ($request->$keyword) {
            switch ($type) {
                case 'search':
                    $model = $model->where($keyword, "like", "%".$request->$keyword."%");
                    break;
                case 'equal':
                    $model = $model->where($keyword, $request->$keyword);
                    break;
                case 'not_equal':
                    $model = $model->where($keyword, "!=", $request->$keyword);
                    break;
                default:
                    break;
            }
        }

        return $model;
    }

    static function orderByWithListType($request, $model, $listTypes)
    {
        foreach ($listTypes as $listType) {
            if ($listType["list_type"] == $request->list_type) {
                $model = $model->orderBy($listType["column"], $listType["sorting"]);
            }
        }

        return $model;
    }
}
