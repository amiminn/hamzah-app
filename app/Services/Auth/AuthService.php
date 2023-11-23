<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private static function setLogin($id)
    {
        Auth::loginUsingId($id);
        $user = Auth::user();
        $token = $user->createToken('ApiToken')->plainTextToken;
        session(['token' => $token]);
        return compact("user", "token");
    }

    public function login(Request $request)
    {
        try {
            if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
                $user = Auth::user();
                return self::setLogin($user->id);
            } else {
                return Response::failed("Oops, ada kesalahan username atau password.");
            }
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public function register($request)
    {
        try {
            User::create([
                "name" => $request["name"],
                "username" => $request["username"],
                "password" => $request["password"],
            ]);

            return Response::success("register telah berhasil.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public function confirm($token)
    {
        try {
            User::where('token', $token)->update(["isActive" => 1]);
            return Response::success("akun telah aktif.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    public function resetPassword($request)
    {
        try {
            // send email with token
            return Response::success("silahkan cek email untuk mereset ulang password.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public function ubahPassword($request)
    {
        try {
            User::where("id", Auth::user()->id)->update([
                "password" => $request["password"]
            ]);
            return Response::success("password baru berhasil diterapkan.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }
}
