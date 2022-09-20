<?php

namespace App\Http\Controllers\RestApi;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $successStatus = 200;

    /**
     * Kullanıcı Oluşturma
     *
     * @param [string] name
     * @param [string] email
     * @param [string] password
     * @return [string] message
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new UsersModel([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        $message['success'] = 'Kullanıcı Başarıyla Oluşturuldu.';

        return response()->json([
            'message' => $message
        ], 201);
    }

    /**
     * Kullanıcı Girişi ve token oluşturma
     *
     * @param [string] username
     * @param [string] password
     * @return [string] token
     * @return [string] token_type
     * @return [string] expires_at
     * @return [string] success
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = request(['username', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::users();
            $message['token'] = $user->createToken('MyApp')->accessToken;
            $message['token_type'] = 'Bearer';
            $message['experies_at'] = Carbon::parse(Carbon::now()->addWeeks(1))->toDateTimeString();
            $message['success'] = 'Kullanıcı Girişi Başarılı';

            return response()->json(['message' => $message], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 200);
        }
    }
}
