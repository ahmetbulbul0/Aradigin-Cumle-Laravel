<?php

namespace App\Http\Controllers\Pages\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Tools\VisitorMenuDataGet;
use App\Http\Controllers\Api\Users\UserSignInController;
use App\Http\Controllers\Api\Constants\ConstantsListController;

class SignInPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Yazar Girişi";
        $data["menu"] = VisitorMenuDataGet::get();
        return view("visitor.pages.sign_in")->with("data", $data);
    }

    public function form(Request $request)
    {
        $data["data"] = [
            "no" => $request->no,
            "password" => $request->password
        ];

        $signed = UserSignInController::get($data);

        if (isset($signed["errors"])) {
            return $this->index($signed);
        }

        switch (Session::get("userData.type.no")) {
            case ConstantsListController::getUserTypeAuthorOnlyNotDeleted():
                return redirect(route("yazar_paneli_anapanel"));
                break;
            case ConstantsListController::getUserTypeSystemOnlyNotDeleted():
                return redirect(route("sistem_paneli_anapanel"));
                break;
            default:
                return $this->index($signed);
                break;
        }
    }
}
