<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Models\ConstantsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Requests\Constants\ConstantsIndexRequest;
use App\Http\Requests\Constants\ConstantsStoreRequest;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class ConstantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConstantsIndexRequest $request)
    {
        $constants = new ConstantsModel();

        $listTypeNames = [
            'no09',
            'no90',
            'keyAZ',
            'keyZA',
            'valueAZ',
            'valueZA'
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $constants = EloquentGenerator::orderByWithListType($request, $constants, $listTypes);

        $constants = EloquentGenerator::whereGenerateByColumn($request, $constants, "key", "search");
        $constants = EloquentGenerator::whereGenerateByColumn($request, $constants, "value", "search");

        $constants = $constants->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Constants", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "key", "value"]),
            "data" => RestApiResponseGenerator::dataGenerate($constants)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConstantsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateConstantsNo(),
            "key" => $request->key,
            "value" => $request->value ? $request->value : NULL
        ];

        ConstantsModel::create($data);

        $constant = ConstantsModel::where(["no" => $data["no"]])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Constant", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["key", "value"]),
            "data" => RestApiResponseGenerator::dataGenerate($constant)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($constantNo)
    {
        $constant = ConstantsModel::where(["no" => $constantNo])->first() ? ConstantsModel::where(["no" => $constantNo])->get() : ConstantsModel::where(["no" => $constantNo])->first();

        if (!$constant) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Constant", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $constantNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Constant", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $constantNo]),
            "data" => RestApiResponseGenerator::dataGenerate($constant)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($constantNo, Request $request)
    {
        $oldConstant = ConstantsModel::where(["no" => $constantNo])->first() ? ConstantsModel::where(["no" => $constantNo])->get() : ConstantsModel::where(["no" => $constantNo])->first();

        if (!$oldConstant) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Constant", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["key", "value"], ["label" => "no", "value" => $constantNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "key" => $request->key ? $request->key : $oldConstant[0]->key,
            "value" => $request->value ? $request->value : $oldConstant[0]->value,
        ];

        ConstantsModel::where(["no" => $constantNo])->update($data);

        $newConstant = ConstantsModel::where(["no" => $constantNo])->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Constant", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["key", "value"], ["label" => "no", "value" => $constantNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldConstant),
                "new" => RestApiResponseGenerator::dataGenerate($newConstant)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($constantNo)
    {
        $constant = ConstantsModel::where(["no" => $constantNo])->first() ? ConstantsModel::where(["no" => $constantNo])->get() : ConstantsModel::where(["no" => $constantNo])->first();

        if (!$constant) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("Constant", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $constantNo]),
                "data" => 0
            ], 404);
        }

        ConstantsModel::where(["no" => $constantNo])->delete();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Constant", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $constantNo]),
            "data" => RestApiResponseGenerator::dataGenerate($constant)
        ], 200);
    }
}
