<?php

namespace App\Http\Controllers\RestApi;

use Illuminate\Http\Request;
use App\Models\UserTypesModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\NoGenerator;
use App\Http\Requests\UserTypesIndexRequest;
use App\Http\Requests\UserTypesStoreRequest;
use App\Models\UsersModel;
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

        switch ($request->is_deleted) {
            case true:
                $users = $userTypes->where("is_deleted", true);
                break;
            case false:
                $userTypes = $userTypes->where("is_deleted", false);
                break;
            default:
                $userTypes = $userTypes->where("is_deleted", false);
                break;
        }

        switch ($request->list_type) {
            case 'no09':
                $userTypes = $userTypes->orderBy("no", "ASC");
                break;
            case 'no90':
                $userTypes = $userTypes->orderBy("no", "DESC");
                break;
            case 'nameAZ':
                $userTypes = $userTypes->orderBy("name", "ASC");
                break;
            case 'nameZA':
                $userTypes = $userTypes->orderBy("name", "DESC");
                break;
            default:
                break;
        }

        $userTypes = $userTypes->get();

        return response()->json([
            "message" => "User Types Listed Successfully",
            "query" => [
                "is_deleted" => $request->is_deleted,
                "list_type" => $request->list_type
            ],
            "data" => [
                "count" => count($userTypes),
                "userTypes" => $userTypes
            ]
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

        $userType = UserTypesModel::where("is_deleted", false)->where("no", $data["no"])->get();

        return response()->json([
            "message" => "User Type Created Successfully",
            "query" => [
                "name" => $request->name
            ],
            "data" => [
                "count" => count($userType),
                "user" => $userType
            ]
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
        $userType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get();

        return response()->json([
            "message" => "User Type Showed Successfully",
            "query" => [
                "no" => $userTypeNo
            ],
            "data" => [
                "count" => count($userType),
                "user" => $userType
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTypesModel  $userTypesModel
     * @return \Illuminate\Http\Response
     */
    public function update($userTypeNo ,Request $request)
    {
        $oldUserType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->first();

        $data = [
            "name" => $request->name ?? $oldUserType->name
        ];

        UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->update($data);

        $newUserType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get();

        return response()->json([
            "message" => "User Type Updated Successfully",
            "query" => [
                "name" => $request->name
            ],
            "data" => [
                "count" => count($newUserType),
                "oldUser" => $oldUserType,
                "newUser" => $newUserType
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
        $userType = UserTypesModel::where(["is_deleted" => false, "no" => $userTypeNo])->get();

        UserTypesModel::where(["is_deletd", false, "no", $userTypeNo])->update("is_deleted", true);
        UsersModel::where(["is_deleted" => false, "type" => $userTypeNo])->update("is_deleted", true);

        return response()->json([
            "message" => "User Type Deleted Successfully",
            "query" => [
                "no" => $userTypeNo,
            ],
            "data" => [
                "count" => count($userType),
                "deletedUser" => $userType
            ]
        ], 200);
    }
}
