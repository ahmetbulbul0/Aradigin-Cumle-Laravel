<?php

namespace App\Http\Controllers\RestApi;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\UsersSettings\UsersSettingsIndexRequest;
use App\Http\Requests\UsersSettings\UsersSettingsStoreRequest;

class UsersSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersSettingsIndexRequest $request)
    {
        $usersSettings = new UsersSettingsModel();

        switch ($request->is_deleted) {
            case true:
                $usersSettings = $usersSettings->where("is_deleted", true);
                break;
            case false:
                $usersSettings = $usersSettings->where("is_deleted", false);
                break;
            default:
                $usersSettings = $usersSettings->where("is_deleted", false);
                break;
        }

        switch ($request->list_type) {
            case 'no09':
                $usersSettings = $usersSettings->orderBy("no", "ASC");
                break;
            case 'no90':
                $usersSettings = $usersSettings->orderBy("no", "DESC");
                break;
            case 'userNo09':
                $usersSettings = $usersSettings->orderBy("user_no", "ASC");
                break;
            case 'userNo90':
                $usersSettings = $usersSettings->orderBy("user_no", "DESC");
                break;
            case 'websiteThemeAZ':
                $usersSettings = $usersSettings->orderBy("website_theme", "ASC");
                break;
            case 'websiteThemeZA':
                $usersSettings = $usersSettings->orderBy("website_theme", "DESC");
                break;
            case 'dashboardThemeAZ':
                $usersSettings = $usersSettings->orderBy("dashboard_theme", "ASC");
                break;
            case 'dashboardThemeZA':
                $usersSettings = $usersSettings->orderBy("dashboard_theme", "DESC");
                break;
            default:
                break;
        }

        if (!empty($request->user_no)) {
            $usersSettings = $usersSettings->where("user_no", $request->user_no);
        }

        if (!empty($request->dashboard_theme)) {
            $usersSettings = $usersSettings->where("dashboard_theme", $request->dashboard_theme);
        }

        if (!empty($request->website_theme)) {
            $usersSettings = $usersSettings->where("website_theme", $request->website_theme);
        }

        $usersSettings = $usersSettings->with("userNo")->get();

        return response()->json([
            "message" => "User Settings Listed Successfully",
            "query" => [
                "is_deleted" => $request->is_deleted,
                "list_type" => $request->list_type,
                "user_no" => $request->user_no,
                "website_theme" => $request->website_theme,
                "dashboard_theme" => $request->dashboard_theme,
            ],
            "data" => [
                "count" => count($usersSettings),
                "usersSettings" => $usersSettings
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersSettingsStoreRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateUsersSettingsNo(),
            "user_no" => intval($request->user_no),
            "dashboard_theme" => strtolower($request->dashboard_theme),
            "website_theme" => strtolower($request->website_theme)
        ];

        UsersSettingsModel::create($data);

        $usersSettings = UsersSettingsModel::where("is_deleted", false)->where("no", $data["no"])->get();

        return response()->json([
            "message" => "User Settings Created Successfully",
            "query" => [
                "name" => $request->name,
                "user_no" => $request->user_no,
                "dashboard_theme" => $request->dashboard_theme,
                "website_theme" => $request->website_theme
            ],
            "data" => [
                "count" => count($usersSettings),
                "user" => $usersSettings
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersSettingsModel  $UsersSettingsModel
     * @return \Illuminate\Http\Response
     */
    public function show($userSettingsNo)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->get();

        return response()->json([
            "message" => "User Settings Showed Successfully",
            "query" => [
                "no" => $userSettingsNo
            ],
            "data" => [
                "count" => count($userSettings),
                "userSettings" => $userSettings
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersSettingsModel  $UsersSettingsModel
     * @return \Illuminate\Http\Response
     */
    public function update($userSettingsNo, Request $request)
    {
        $oldUserSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->first();

        $data = [
            "user_no" => $request->user_no ?? $oldUserSettings->user_no,
            "dashboard_theme" => $request->dashboard_theme ?? $oldUserSettings->dashboard_theme,
            "website_theme" => $request->website_theme ?? $oldUserSettings->website_theme
        ];

        UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->update($data);

        $newUserSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->get();

        return response()->json([
            "message" => "User Settings Updated Successfully",
            "query" => [
                "user_no" => $request->user_no,
                "dashboard_theme" => $request->dashboard_theme,
                "website_theme" => $request->website_theme
            ],
            "data" => [
                "count" => count($newUserSettings),
                "oldUserSettings" => $oldUserSettings,
                "newUserSettings" => $newUserSettings
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypesModel  $userTypesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($userSettingsNo)
    {
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->get();

        UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->update(["is_deleted" => true]);
        UsersModel::where(["is_deleted" => false, "settings" => $userSettingsNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => "User Settings Deleted Successfully",
            "query" => [
                "no" => $userSettingsNo,
            ],
            "data" => [
                "count" => count($userSettings),
                "deletedUserSettings" => $userSettings
            ]
        ], 200);
    }
}
