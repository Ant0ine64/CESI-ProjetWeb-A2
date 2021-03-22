<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Type;
use App\Models\Center;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function register(Request $request){
        $id_type = Type::where('type', $request.type)->first();
        $id_center = Center::where('city', $request.city)->first();

        User::insert("INSERT INTO `user` (firstname, lastname, id_type, id_center, login, password_hash)
            VALUES (?, ?, ?, ?, ?, ?)", [
            $request.firstname,
            $request.lastname,
            $id_type.id,
            $id_center.id,
            $request.login,
            Hash::make($request.password)
        ]);

       return response('Success', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
