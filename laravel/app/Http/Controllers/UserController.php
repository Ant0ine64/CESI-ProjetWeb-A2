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
    //CREATE USER
    function register(Request $request){
        //request decomposition
        $input = $request->all();

        foreach ($input as $value) {
            if($value == null || $value == "" || $value == 0) {
                return response('Error invalid input value :'.$value, 400)
                    ->header('Content-Type', 'text/plain');
            }
        }
        //print_r(Type::where('type', $input['type']));
        // find the ids of those fields
        $id_type = json_decode(Type::where('type', $input['type'])->first(), true)['id'];
        $id_center = json_decode(Center::where('city', $input['city'])->first(), true)['id'];

        $user = User::insert([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'id_type' => $id_type,
            'id_center' => $id_center,
            'login' => $input['login'],
            'password_hash' => Hash::make($input['password'])
        ]);

       return response('Successfully created user : '.$user, 200)
                  ->header('Content-Type', 'text/plain');
    }

    //READ
    function readAll() {
        return User::all();
    }

    function readByLogin(Request $request) {
        $login = $request->input('login');
        return json_decode(User::where('login', $login), true);
    }


    //UPDATE
    function updateByLogin(Request $request) {
        $login = $request->input('login');
        // find the ids of those fields
        $id_type = json_decode(Type::where('type', $request->input('type'))->first(), true)['id'];
        $id_center = json_decode(Center::where('city', $request->input('city'))->first(), true)['id'];

        User::where('login', $login)->update([
            'firstname' => $request->input("firstname"),
            'lastname' => $request->input("lastname"),
            'id_type' => $id_type,
            'id_center' => $id_center
        ]);


        return response('Successfully updated user : '.$login, 200)
            ->header('Content-Type', 'text/plain');
    }

    function updatePasswordByLogin(Request $request) {
        $login = $request->input('login');

        User::where('login', $login)->update([
            'password_hash' => Hash::make($request->input("password"))
        ]);
    }


    //DELETE
    function deleteByLogin(Request $request) {
        $login = $request->input('login');
        User::where('login', $login)->delete();

        return response('Successfully deleted user : '.$login, 200)
            ->header('Content-Type', 'text/plain');
    }
}
