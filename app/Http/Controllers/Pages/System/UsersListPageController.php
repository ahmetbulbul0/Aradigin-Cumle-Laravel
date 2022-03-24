<?php

namespace App\Http\Controllers\Pages\System;

use App\Http\Controllers\Api\Users\UsersListController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersListPageController extends Controller
{
    public function index($data = NULL)
    {
        $data["page_title"] = "Kullanıcılar";
        if (!isset($data["data"])) {
            $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationships();
        }
        return view("system.pages.users_list")->with("data", $data);
    }
    public function form(Request $request)
    {
        $listingType = $request->listingType;
        switch ($listingType) {
            case 'default':
                return redirect(route("kullanicilar"));
                break;
            case 'no09':
                return redirect(route("kullanicilar_no09"));
                break;
            case 'no90':
                return redirect(route("kullanicilar_no90"));
                break;
            case 'fullNameAZ':
                return redirect(route("kullanicilar_fullNameAZ"));
                break;
            case 'fullNameZA':
                return redirect(route("kullanicilar_fullNameZA"));
                break;
            case 'usernameAZ':
                return redirect(route("kullanicilar_usernameAZ"));
                break;
            case 'usernameZA':
                return redirect(route("kullanicilar_usernameZA"));
                break;
            case 'typeAZ':
                return redirect(route("kullanicilar_typeAZ"));
                break;
            case 'typeZA':
                return redirect(route("kullanicilar_typeZA"));
                break;
        }
        return $this->index();
    }
    public function no09()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscNo();
        return $this->index($data);
    }
    public function no90()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescNo();
        return $this->index($data);
    }
    public function fullNameAZ()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscFullName();
        return $this->index($data);
    }
    public function fullNameZA()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescFullName();
        return $this->index($data);
    }
    public function usernameAZ()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscUsername();
        return $this->index($data);
    }
    public function usernameZA()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescUsername();
        return $this->index($data);
    }
    public function typeAZ()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByAscType();
        return $this->index($data);
    }
    public function typeZA()
    {
        $data["data"] = UsersListController::getAllDataOnlyNotDeletedDatasAllRelationshipsOrderByDescType();
        return $this->index($data);
    }
}
