<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

namespace App\Models\Repository\AUTH;

use Illuminate\Http\Request;
use App\Http\Services\AUTH\RegisterService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterRepository implements RegisterService
{
    protected User $user;

    public function save(Request $request):string
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken('MyAppToken')->plainTextToken;
        return $token;
    }

}
