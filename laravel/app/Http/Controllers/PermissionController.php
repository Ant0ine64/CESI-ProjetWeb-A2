<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionCustom;
use App\Models\PermissionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{

    public static function tryGettingToView($viewName, $permission){
      if(!PermissionController::isLogged())
          return view('login');

        if(PermissionController::can($permission))
            return view($viewName);
        else
            return abort(403);
    }


    public static function isLogged(){
        return Auth::check();
    }

    /*public static function ensureUserHasRole($request, Closure $next, $role){
        if (! $request->user()->hasRole($role)) {
            // Redirect...
        }

        return $next($request);
    }*/

    // Test permission, return true if user can
    public static function can($permission): bool
    {
        $ability = false;
        $permission_id = Permission::where('title', $permission)->first()['id'];

        // used for getting type and id
        $user = Auth::user();

        if($user == null)
            return false;

        Log::debug('utype:'.$user['id_type'].' permid'.$permission_id);

        if(PermissionType::where('id_type', $user['id_type'])->where('id_permission', $permission_id)->first()) {
            //permission exist in standard permission_type table
            return true;
        } elseif ($user['type'] != 4) { //simple perms : not delegate
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

    }

    function updateDelegatePermissions(Request $request) {

    }

    private $updatableDelegatePermissions = [
        2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 32, 33];
}
