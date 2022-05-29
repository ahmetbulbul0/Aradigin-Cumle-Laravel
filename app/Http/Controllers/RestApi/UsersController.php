<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\Users\UsersIndexRequest;
use App\Http\Requests\Users\UsersStoreRequest;
use App\Models\UsersModel;
use App\Models\UsersSettingsModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersIndexRequest $request)
    {
        $users = new UsersModel;

        switch ($request->is_deleted) {
            case true:
                $users = $users->where("is_deleted", true);
                break;
            case false:
                $users = $users->where("is_deleted", false);
                break;
            default:
                $users = $users->where("is_deleted", false);
                break;
        }

        switch ($request->list_type) {
            case 'no09':
                $users = $users->orderBy("no", "ASC");
                break;
            case 'no90':
                $users = $users->orderBy("no", "DESC");
                break;
            case 'fullNameAZ':
                $users = $users->orderBy("full_name", "ASC");
                break;
            case 'fullNameZA':
                $users = $users->orderBy("full_name", "DESC");
                break;
            case 'usernameAZ':
                $users = $users->orderBy("username", "ASC");
                break;
            case 'usernameZA':
                $users = $users->orderBy("username", "DESC");
                break;
            case 'typeAZ':
                $users = $users->orderBy("type", "ASC");
                break;
            case 'typeZA':
                $users = $users->orderBy("type", "DESC");
                break;
            case 'settingsAZ':
                $users = $users->orderBy("settings", "ASC");
                break;
            case 'settingsZA':
                $users = $users->orderBy("settings", "DESC");
                break;
            default:
                break;
        }

        if (!empty($request->type)) {
            $users = $users->where("type", $request->type);
        }

        if (!empty($request->settings)) {
            $users = $users->where("settings", $request->settings);
        }

        $users = $users->with("type", "settings")->get();

        return response()->json([
            "message" => "Users Listed Successfully",
            "query" => [
                "is_deleted" => $request->is_deleted,
                "list_type" => $request->list_type,
                "type" => $request->type,
                "settings" => $request->settings,
                "full_name" => $request->full_name,
                "username" => $request->username,
                "password" => $request->password
            ],
            "data" => [
                "count" => count($users),
                "users" => $users
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateUsersNo(),
            "full_name" => $request->full_name,
            "username" => $request->username,
            "password" => $request->password,
            "type" => $request->type,
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

        $user = UsersModel::where("is_deleted", false)->where("no", $data["no"])->with("type", "settings")->get();

        return response()->json([
            "message" => "User Created Successfully",
            "query" => [
                "full_name" => $request->full_name,
                "username" => $request->username,
                "password" => $request->password,
                "type" => $request->type
            ],
            "data" => [
                "count" => count($user),
                "user" => $user
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($userNo)
    {
        $user = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get();

        return response()->json([
            "message" => "User Showed Successfully",
            "query" => [
                "no" => $userNo,
            ],
            "data" => [
                "count" => count($user),
                "user" => $user
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($userNo, Request $request)
    {
        $oldUser = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->first();

        $data = [
            "full_name" => $request->full_name ?? $oldUser->full_name,
            "username" => $request->username ?? $oldUser->username,
            "password" => $request->password ?? $oldUser->password,
            "type" => $request->type ?? $oldUser->type
        ];

        UsersModel::where(["is_deleted" => false, "no" => $userNo])->update($data);

        $newUser = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get();

        return response()->json([
            "message" => "User Updated Successfully",
            "query" => [
                "full_name" => $request->full_name,
                "username" => $request->username,
                "password" => $request->password,
                "type" => $request->type
            ],
            "data" => [
                "count" => count($newUser),
                "oldUser" => $oldUser,
                "newUser" => $newUser
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy($userNo)
    {
        $user = UsersModel::where(["is_deleted" => false, "no" => $userNo])->with("type", "settings")->get();

        UsersModel::where(["is_deleted" => false, "no" => $userNo])->update("is_deleted", true);
        UsersSettingsModel::where(["is_deletd", false, "user_no", $userNo])->update("is_deleted", true);

        return response()->json([
            "message" => "User Deleted Successfully",
            "query" => [
                "no" => $userNo,
            ],
            "data" => [
                "count" => count($user),
                "deletedUser" => $user
            ]
        ], 200);
    }
}
