<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\LinkUrlGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
use App\Http\Requests\Categories\CategoriesIndexRequest;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Controllers\Api\Constants\ConstantsListController;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesIndexRequest $request) // FİNAL
    {
        $categories = new CategoriesModel;

        $categories = EloquentGenerator::whereGenerateByIsDeleted($request, $categories);

        $listTypeNames = [
            'no09',
            'no90',
            'nameAZ',
            'nameZA',
            'type09',
            'type90',
            'main_category09',
            'main_category90',
            'link_urlAZ',
            'link_urlZA'
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $categories = EloquentGenerator::orderByWithListType($request, $categories, $listTypes);

        $categories = EloquentGenerator::whereGenerateByColumn($request, $categories, "name", "search");
        $categories = EloquentGenerator::whereGenerateByColumn($request, $categories, "type", "equal");
        $categories = EloquentGenerator::whereGenerateByColumn($request, $categories, "main_category", "equal");
        $categories = EloquentGenerator::whereGenerateByColumn($request, $categories, "link_url", "search");

        $categories = $categories->with("type", "mainCategory")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Categories", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "name", "type", "main_category", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($categories)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateCategoriesNo(),
            "name" => strtolower($request->name),
            "type" => intval($request->type)
        ];

        if ($data["type"] == ConstantsListController::getCategoryTypeSubOnlyNotDeleted()) {
            $request->validate(["main_category" => ["required", "integer", "exists:categories,no"]]);
            $data["main_category"] = intval($request->main_category);
        }

        $data["link_url"] = LinkUrlGenerator::single($data["name"]);

        CategoriesModel::create($data);

        $category = CategoriesModel::where(["is_deleted" => false, "no" => $data["no"]])->with("type", "mainCategory")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "type", "main_category", "link_url"]),
            "data" => RestApiResponseGenerator::dataGenerate($category)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryNo)
    {
        $category = CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first() ? CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->get() : CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first();

        if (!$category) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryNo]),
            "data" => RestApiResponseGenerator::dataGenerate($category)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($categoryNo, Request $request)
    {
        $oldCategory = CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first() ? CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->get()->toArray() : CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first();

        if (!$oldCategory) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "type", "main_category", "link_url"], ["label" => "no", "value" => $categoryNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "name" => $request->name ? Str::lower($request->name) : $oldCategory[0]["name"],
            "type" => $request->type ? intval($request->type) : ($oldCategory[0]["type"] ? $oldCategory[0]["type"]["no"] : $oldCategory[0]["type"]),
            "main_category" => $request->main_category ? intval($request->main_category) : ($oldCategory[0]["main_category"] ? $oldCategory[0]["main_category"]["no"] : $oldCategory[0]["main_category"]),
            "link_url" => $request->link_url ? Str::lower($request->link_url) : $oldCategory[0]["link_url"]
        ];

        CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->update($data);

        $newCategory = CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "type", "main_category", "link_url"], ["label" => "no", "value" => $categoryNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldCategory),
                "new" => RestApiResponseGenerator::dataGenerate($newCategory)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryNo)
    {
        $category = CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first() ? CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->get() : CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->with("type", "mainCategory")->first();

        if (!$category) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Category", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryNo]),
                "data" => 0
            ], 404);
        }

        CategoriesModel::where(["is_deleted" => false, "no" => $categoryNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Category", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $categoryNo]),
            "data" => RestApiResponseGenerator::dataGenerate($category)
        ], 200);
    }
}
