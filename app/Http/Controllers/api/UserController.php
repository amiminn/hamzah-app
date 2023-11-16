<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::paginate(10);
    }

    public function store(Request $request)
    {
        try {
            $user = [
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "password" => $request->password,
            ];

            User::create($user);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return User::find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = [
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "password" => $request->password,
                "phone" => $request->phone,
                "role" => $request->role,
                "isAdmin" => $request->isAdmin,
                "isActive" => $request->isActive,
            ];

            User::find($id)->update($user);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // users auth
    public function userAuth()
    {
        return auth()->user();
    }

    public function updateAuth(Request $request)
    {
        try {
            $user = [
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "password" => $request->password,
                "phone" => $request->phone,
            ];

            User::find(auth()->user()->id)->update($user);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateAvatar(Request $request)
    {
        //code
    }
}
