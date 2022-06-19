<?php

namespace App\Http\Controllers\RestApi;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Requests\UserTypes\UserTypesIndexRequest;
use App\Http\Requests\UserTypes\UserTypesStoreRequest;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class UserTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserTypesIndexRequest $request)
    {
        $userTypes = new UserTypesModel;

        $userTypes = EloquentGenerator::whereGenerateByIsDeleted($request, $userTypes);

        $listTypeNames = [
            "no09",
            "no90",
            "nameAZ",
            "nameZA",
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $userTypes = EloquentGenerator::orderByWithListType($request, $userTypes, $listTypes);

        $userTypes = EloquentGenerator::whereGenerateByColumn($request, $userTypes, "name", "equal");

        $userTypes = $userTypes->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Types", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "name"]),
            "data" => RestApiResponseGenerator::dataGenerate($userTypes)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypesStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateUserTypesNo(),
            "name" => strtolower($request->name)
        ];

        UserTypesModel::create($data);

        $userType = UserTypesModel::where(["is_deleted" => false, "no" => $data["no"]])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Type", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name"]),
            "data" => RestApiResponseGenerator::dataGenerate($userType)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTypesModel  $userTypesModel
     * @return \Illuminate\Http\Response
     */
    public function show($userTypeNo)
    {
        $userType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first() ? UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get() : UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first();

        if (!$userType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Type", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userTypeNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Type", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userTypeNo]),
            "data" => RestApiResponseGenerator::dataGenerate($userType)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTypesModel  $userTypesModel
     * @return \Illuminate\Http\Response
     */
    public function update($userTypeNo, Request $request)
    {
        $oldUserType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first() ? UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get() : UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first();

        if (!$oldUserType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Type", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $userTypeNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "name" => $request->name ? Str::lower($request->name) : $oldUserType[0]->name
        ];

        UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->update($data);

        $newUserType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Type", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name"], ["label" => "no", "value" => $userTypeNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldUserType),
                "new" => RestApiResponseGenerator::dataGenerate($newUserType)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypesModel  $userTypesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($userTypeNo)
    {
        $userType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first() ? UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get() : UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first();

        if (!$userType) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Type", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userTypeNo]),
                "data" => 0
            ], 404);
        }

        UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->update(["is_deleted" => true]);
        UsersModel::where(["is_deleted" => false, "type" => $userTypeNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Type", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userTypeNo]),
            "data" => RestApiResponseGenerator::dataGenerate($userType)
        ], 200);
    }
}
