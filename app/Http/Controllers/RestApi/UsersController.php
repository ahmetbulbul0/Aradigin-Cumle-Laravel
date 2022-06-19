<?php

namespace App\Http\Controllers\RestApi;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\Users\UsersIndexRequest;
use App\Http\Requests\Users\UsersStoreRequest;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersIndexRequest $request) // listing
    {
        $users = new UsersModel;

        $users = EloquentGenerator::whereGenerateByIsDeleted($request, $users);

        $listTypeNames = [
            "no09",
            "no90",
            "fullNameAZ",
            "fullNameZA",
            "usernameAZ",
            "usernameZA",
            "typeAZ",
            "typeZA",
            "settingsAZ",
            "settingsZA"
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $users = EloquentGenerator::orderByWithListType($request, $users, $listTypes);

        $users = EloquentGenerator::whereGenerateByColumn($request, $users, "username", "search");
        $users = EloquentGenerator::whereGenerateByColumn($request, $users, "full_name", "search");
        $users = EloquentGenerator::whereGenerateByColumn($request, $users, "password", "search");
        $users = EloquentGenerator::whereGenerateByColumn($request, $users, "type", "equal");
        $users = EloquentGenerator::whereGenerateByColumn($request, $users, "settings", "equal");

        $users = $users->with("type", "settings")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Users", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "type", "settings", "full_name", "username", "password"]),
            "data" => RestApiResponseGenerator::dataGenerate($users)
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request) // create
    {
        $data = [
            "no" => NoGenerator::generateUsersNo(),
            "full_name" => Str::lower($request->full_name),
            "username" => Str::lower($request->username),
            "password" => $request->password,
            "type" => intval($request->type),
        ];

        $userSettingsData = [
            "no" => NoGenerator::generateUsersSettingsNo(),
            "user_no" => $data["no"],
            "website_theme" => "dark",
            "dashboard_theme" => "dark"
        ];

        $data["settings"] = $userSettingsData["no"];

        UsersSettingsModel::create($userSettingsData);
        UsersModel::create($data);

        $user = UsersModel::where(["is_deleted" => false, "no" => $data["no"]])->with("type", "settings")->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["full_name", "username", "password", "type"]),
            "data" => RestApiResponseGenerator::dataGenerate($user)
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($userNo) // show
    {
        $user = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->first() ? UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get() : UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->first();

        if (!$user) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userNo]),
            "data" => RestApiResponseGenerator::dataGenerate($user)
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($userNo, Request $request) // update
    {
        $oldUser = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->first() ? UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get() : UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->first();

        if (!$oldUser) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User", "update", 404),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["full_name", "username", "password", "type"], ["label" => "no", "value" => $userNo]),
                "data" => 0
            ], 404);
        }

        $data = [
            "full_name" => $request->full_name ? Str::lower($request->full_name) : $oldUser[0]->full_name,
            "username" => $request->username ? Str::lower($request->username) : $oldUser[0]->username,
            "password" => $request->password ?? $oldUser[0]->password,
            "type" => $request->type ? intval($request->type) : $oldUser[0]->type
        ];

        UsersModel::where(["is_deleted" => false, "no" => $userNo])->update($data);

        $newUser = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["full_name", "username", "password", "type"], ["label" => "no", "value" => $userNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldUser),
                "new" => RestApiResponseGenerator::dataGenerate($newUser)
            ]
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($userNo) // delete
    {
        $user = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get();

        UsersModel::where(["is_deleted" => false, "no" => $userNo])->update(["is_deleted" => true]);
        UsersSettingsModel::where(["is_deleted" => false, "user_no" => $userNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userNo]),
            "data" => RestApiResponseGenerator::dataGenerate($user)
        ], 200);
    }
}
