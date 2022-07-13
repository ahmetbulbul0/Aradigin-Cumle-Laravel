<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class RestApiStructure extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RestApiIndexRequest $request)
    {
        $model = new Model;

        $model = EloquentGenerator::whereGenerateByIsDeleted($request, $model);

        $listTypeNames = [
            "column09",
            "column90",
            "columnAZ",
            "columnZA",
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $model = EloquentGenerator::orderByWithListType($request, $model, $listTypes);

        $model = EloquentGenerator::whereGenerateByColumn($request, $model, "column_name", "where_type");

        $model = $model->with("relationship")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Model Name", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "query_values"]),
            "data" => RestApiResponseGenerator::dataGenerate($model)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestApiStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateModelNo(),
            "column_name" => $request->column_name,
        ];

        Model::create($data);

        $model = Model::where(["is_deleted" => false, "no" => $data["no"]])->with("relationship")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Model Name", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["query_values"]),
            "data" => RestApiResponseGenerator::dataGenerate($model)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($modelNo)
    {
        $model = Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first() ? Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->get()->toArray() : Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first();

        if (!$model) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Model Name", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $modelNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Model Name", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $modelNo]),
            "data" => RestApiResponseGenerator::dataGenerate($model)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($modelNo, Request $request)
    {
        $oldModel = Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first() ? Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->get()->toArray() : Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first();

        if (!$oldModel) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Model Name", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["query_values"], ["label" => "no", "value" => $modelNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "column_name" => $request->column_name ? $request->column_name : $oldModel[0]->column_name,
        ];

        Model::where(["is_deleted" => false, "no" => $modelNo])->update($data);

        $newModel = Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Model Name", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["query_values"], ["label" => "no", "value" => $modelNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldModel),
                "new" => RestApiResponseGenerator::dataGenerate($newModel)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($modelNo)
    {
        $model = Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first() ? Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->get()->toArray() : Model::where(["is_deleted" => false, "no" => $modelNo])->with("relationship")->first();

        if (!$model) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Model Name", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $modelNo]),
                "data" => 0
            ], 404);
        }

        Model::where(["is_deleted" => false, "no" => $modelNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Model Name", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $modelNo]),
            "data" => RestApiResponseGenerator::dataGenerate($model)
        ], 200);
    }
}
