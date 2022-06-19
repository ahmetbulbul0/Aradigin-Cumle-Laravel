<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestApiResponseGenerator extends Controller
{
    static function messageGenerate($data_name, $action, $status)
    {
        switch ($action) {
            case 'index':
                $action = "Listed";
                break;
            case 'store':
                $action = "Created";
                break;
            case 'show':
                $action = "Showed";
                break;
            case 'update':
                $action = "Updated";
                break;
            case 'delete':
                $action = "Deleted";
                break;
            default:
                $action = "[Action Unknown]";
                break;
        }

        switch ($status) {
            case 200:
                $status = "Successfully";
                break;
            case 404:
                $status = "Failed";
                break;
            default:
                $status = "[Status Unknown]";
                break;
        }

        $responseMessage = $data_name . " " . $action . " " . $status;

        return $responseMessage;
    }
    static function queryGenerate($request, $query_inputs, $extra = null)
    {
        if ($extra != null) {
            $responseQuery[$extra["label"]] = $extra["value"];
        }

        if ($query_inputs != NULL || $request != NULL) {
            foreach ($query_inputs as $input) {
                $responseQuery[$input] = $request->$input ?? NULL;
            }
        }

        return $responseQuery;
    }
    static function dataGenerate($data)
    {
        $responseData["count"] = count($data);
        $responseData["data"] = $data;

        return $responseData;
    }
}
