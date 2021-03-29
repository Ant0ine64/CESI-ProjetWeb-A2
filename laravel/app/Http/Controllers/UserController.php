<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use App\Models\PermissionCustom;
use App\Models\UserPromotion;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Type;
use App\Models\Center;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //CREATE USER
    function register(Request $request){
        //request decomposition
        $input = $request->all();

        Log::debug($input);

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

        return redirect()->route('Users');
    }

    //READ
    static function readAll() {
        $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->get();
        return view('search', ['users' => $users]);
    }

    function readByLogin(Request $request) {
        $login = $request->input('login');
        return json_decode(User::where('login', $login), true);
    }

    public static function tryGettingUserById($userId) {
        return User::where('id', $userId)->get();
    }

    //UPDATE
    function updateByLogin(Request $request) {
        $login = $request->input('login');
        $id_type = Type::where('type', $request->input('type'))->first();
        $id_center = Center::where('city', $request->input('city'))->first();

        if($id_type == null || $id_center == null)
            return response('Error invalid input.', 400)
                ->header('Content-Type', 'text/plain');

        User::where('login', $login)->update([
            'firstname' => $request->input("firstname"),
            'lastname' => $request->input("lastname"),
            'id_type' => $id_type->id,
            'id_center' => $id_center->id
        ]);

        return redirect()->route('Users');
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

    function deleteUserById(Request $request) {
        $userId = $request->input('idUser');

        //clearing tables
        Notation::where('id_user', $userId)->delete();
        WishList::where('id_user', $userId)->delete();
        UserPromotion::where('id_user', $userId)->delete();
        PermissionCustom::where('id_user', $userId)->delete();
        if(User::where('id', $userId)->delete())
            return response('Successfully removed user : ' . $userId, 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong user input', 400)
                ->header('Content-Type', 'text/plain');
    }
}
