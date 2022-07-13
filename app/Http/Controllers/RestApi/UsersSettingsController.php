<?php

namespace App\Http\Controllers\RestApi;

use App\Models\UsersModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UsersSettingsModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Controllers\Tools\EloquentGenerator;
use App\Http\Controllers\Tools\ListTypeGenerator;
use App\Http\Controllers\Tools\RestApiResponseGenerator;
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

        $usersSettings = EloquentGenerator::whereGenerateByIsDeleted($request, $usersSettings);

        $listTypeNames = [
            "no09",
            "no90",
            "userNo09",
            "userNo90",
            "websiteThemeAZ",
            "websiteThemeZA",
            "dashboardThemeAZ",
            "dashboardThemeZA"
        ];
        $listTypes = ListTypeGenerator::listTypeGenerateWithNames($listTypeNames);
        $usersSettings = EloquentGenerator::orderByWithListType($request, $usersSettings, $listTypes);

        $usersSettings = EloquentGenerator::whereGenerateByColumn($request, $usersSettings, "user_no", "equal");
        $usersSettings = EloquentGenerator::whereGenerateByColumn($request, $usersSettings, "dashboard_theme", "equal");
        $usersSettings = EloquentGenerator::whereGenerateByColumn($request, $usersSettings, "website_theme", "equal");

        $usersSettings = $usersSettings->with("userNo")->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("Users Settings", "index", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["is_deleted", "list_type", "user_no", "website_theme", "dashboard_theme"]),
            "data" => RestApiResponseGenerator::dataGenerate($usersSettings)
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

        $usersSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $data["no"]])->with("userNo")->get();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Settings", "store", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "user_no", "dashboard_theme", "website_theme"]),
            "data" => RestApiResponseGenerator::dataGenerate($usersSettings)
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
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first() ? UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->get() : UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first();

        if (!$userSettings) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Settings", "show", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userSettingsNo]),
                "data" => 0
            ], 404);
        }

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Settings", "show", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userSettingsNo]),
            "data" => RestApiResponseGenerator::dataGenerate($userSettings)
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
        $oldUserSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first() ? UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->get()->toArray() : UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first();

        if (!$oldUserSettings) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Settings", "update", 200),
                "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "dashboard_theme", "website_theme"], ["label" => "no", "value" => $userSettingsNo]),
                "data" => 0
            ], 200);
        }

        $data = [
            "dashboard_theme" => $request->dashboard_theme ? Str::lower($request->dashboard_theme) : $oldUserSettings[0]["dashboard_theme"],
            "website_theme" => $request->website_theme ? Str::lower($request->website_theme) : $oldUserSettings[0]["website_theme"]
        ];

        UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->update($data);

        $newUserSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->get()->toArray();

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Settings", "update", 200),
            "query" => RestApiResponseGenerator::queryGenerate($request, ["name", "dashboard_theme", "website_theme"], ["label" => "no", "value" => $userSettingsNo]),
            "data" => [
                "old" => RestApiResponseGenerator::dataGenerate($oldUserSettings),
                "new" => RestApiResponseGenerator::dataGenerate($newUserSettings)
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
        $userSettings = UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first() ? UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->get() : UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->with("userNo")->first();

        if (!$userSettings) {
            return response()->json([
                "message" => RestApiResponseGenerator::messageGenerate("User Settings", "delete", 404),
                "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userSettingsNo]),
                "data" => 0
            ], 404);
        }

        UsersSettingsModel::where(["is_deleted" => false, "no" => $userSettingsNo])->update(["is_deleted" => true]);
        UsersModel::where(["is_deleted" => false, "settings" => $userSettingsNo])->update(["is_deleted" => true]);

        return response()->json([
            "message" => RestApiResponseGenerator::messageGenerate("User Settings", "delete", 200),
            "query" => RestApiResponseGenerator::queryGenerate(NULL, NULL, ["label" => "no", "value" => $userSettingsNo]),
            "data" => RestApiResponseGenerator::dataGenerate($userSettings)
        ], 200);
    }
}
