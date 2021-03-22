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
        $id_type = json_decode(Type::where('type', $request->input('type'))->first(), true)['id'];
        $id_center = json_decode(Center::where('city', $request->input('city'))->first(), true)['id'];

        echo 'Center :'.$id_center .' et type : '.$id_type.'all :';
        print_r($request->all());

        User::insert("INSERT INTO `user` (firstname, lastname, id_type, id_center, login, password_hash)
            VALUES (?, ?, ?, ?, ?, ?)", [
            $request->input(firstname),
            $request->input(lastname),
            $id_type,
            $id_center,
            $request->input(login),
            Hash::make($request.password)
        ]);

       return response('Success', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
