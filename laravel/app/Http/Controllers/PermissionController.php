<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionCustom;
use App\Models\PermissionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    // Test permission, return true if user can
    public static function can($permission): bool
    {

        $ability = false;
        $permission_id = Permission::where('title', $permission)->first()['id'];

        // used for getting type and id
        $user = Auth::user();

        if(PermissionType::where('id_type', $user['id_type'])->where('id_permission', $permission_id)->first()) {
            //permission exist in standard permission_type table
            return true;
        } elseif ($user['id_type'] != 4) { //simple perms : not delegate
            return false;
        }elseif (PermissionCustom::where('id_user', $user['id'])->where('id_permission', $permission_id)->first()) {
            //test in permission_custom table
            return true;
        } else {
            // permission for delegate doesn't exists
            return false;
        }
    }

    function readDelegatePermissions(Request $request) {

        $login = $request->input('login');
        $delegate = User::where('login', $login)->first();

        if ($delegate['id_type'] != 4) { //return if not delegate
            return response('Not a delegate', 404)
                ->header('Content-Type', 'text/plain');
        }

        // find user login and permission title with ids
       $join = PermissionCustom::where('id_user', $delegate['id'])
           ->join('user', 'permission_custom.id_user', '=', 'user.id')
           ->join('permission', 'permission.id', '=', 'permission_custom.id_permission')
           ->select('permission_custom.id_permission', 'permission.title', 'user.login')
           ->get();
        Log::debug($join);

        return view('delegateRead', ['permissions' => $join]);
    }

    function updateDelegatePermissions(Request $request) {

    }

    private $updatableDelegatePermissions = [
        2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 32, 33];
}
