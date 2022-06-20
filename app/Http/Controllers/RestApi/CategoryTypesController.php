<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Http\Requests\CategoryTypes\CategoryTypesIndexRequest;
use App\Http\Requests\CategoryTypes\CategoryTypesStoreRequest;
use App\Models\CategoriesModel;

class CategoryTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryTypesIndexRequest $request)
    {
        $categoryTypes = new CategoryTypesModel();

        $categoryTypes = EloquentGenerator::whereGenerateByIsDeleted($request, $categoryTypes);

        $listTypeNames = [
            "no09",
            "no90",
            "nameAZ",
            "nameZA",
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $categoryTypes = EloquentGenerator::orderByWithListType($request, $categoryTypes, $listTypes);

        $categoryTypes = EloquentGenerator::whereGenerateByColumn($request, $categoryTypes, "name", "equal");

        $categoryTypes = $categoryTypes->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Types", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "name"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryTypes)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryTypesStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateCategoryTypesNo(),
            "name" => strtolower($request->name)
        ];

        CategoryTypesModel::create($data);

        $categoryType = CategoryTypesModel::where(["is_deleted" => false, "no" => $data["no"]])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Type", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name"]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryType)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryTypeNo)
    {
        $categoryType = CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first() ? CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->get() : CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first();

        if (!$categoryType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Type", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryTypeNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Type", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryTypeNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryType)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($categoryTypeNo, Request $request)
    {
        $oldCategoryType = CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first() ? CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->get() : CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first();

        if (!$oldCategoryType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Type", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $categoryTypeNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "name" => $request->name ? Str::lower($request->name) : $oldCategoryType[0]->name
        ];

        CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->update($data);

        $newCategoryType = CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Type", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $categoryTypeNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldCategoryType),
                "new" => RestApiResponseGenerator::dataGenerate($newCategoryType)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryTypeNo)
    {
        $categoryType = CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first() ? CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->get() : CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->first();

        if (!$categoryType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category Type", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryTypeNo]),
                "data" => 0
            ], 404);
        }

        CategoryTypesModel::where(["is_deleted" => false, "no" => $categoryTypeNo])->update(["is_deleted" => true]);
        CategoriesModel::where(["is_deleted" => false, "type" => $categoryTypeNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category Type", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryTypeNo]),
            "data" => RestApiResponseGenerator::dataGenerate($categoryType)
        ], 200);
    }
}
