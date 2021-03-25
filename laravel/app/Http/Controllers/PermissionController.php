<?php

namespace App\Http\Controllers;


use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionCustom;
use App\Models\PermissionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public static function readAllDelegablePermissions() {
        //$updatablePermissions = [];
        foreach (Permission::all() as $perm) {
            if (in_array($perm['id'], self::UPDATABLE_DELEGATE_PERM)) {
                //check if permission is updatable
                $updatablePermissions[$perm['id']] = $perm['title'];
            }
        }
        return $updatablePermissions;
    }

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


    //DELEGATE STUFF

    function readDelegatePermissions(Request $request) {

        $login = $request->input('login');
        $delegate = User::where('login', $login)->first();

        if ($delegate['id_type'] != 4) { //return if not delegate
            return response('Not a delegate', 404)
                ->header('Content-Type', 'text/plain');
        }

        // find permission of corresponding user
       $join = PermissionCustom::where('id_user', $delegate['id'])->get();

        foreach ($join as $perm) $permissions[] = $perm->id_permission;

        return view('delegateRead', ['username' => $login, 'user_permissions' => $permissions]);
    }

    /**
     * @param Request $request as 'login' the unique username, 'permissions' an array of permissions title
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|string
     */
    function updateDelegatePermissions(Request $request) {

        $login = $request->input('login');
        $delegate = User::where('login', $login)->first();

        $permissions = array_keys($request->except(['login', '_token']));
        Log::debug($permissions);

        if ($delegate['id_type'] != 4) { //return if not delegate
            return response('Not a delegate', 404)
                ->header('Content-Type', 'text/plain');
        }

        //throw 403 forbidden if unauthorized perm is chosen
        foreach ($permissions as $perm) {
            if (!in_array($perm, self::UPDATABLE_DELEGATE_PERM)) abort(403);
        }

        //edit the permissions
        PermissionCustom::where('id_user', $delegate['id'])->delete();
        foreach ($permissions as $perm)PermissionCustom::insert([
            'id_user' => $delegate['id'],
            'id_permission' => $perm
        ]);

        return redirect()->route('delegate.read', ['login' => $login]);
    }

     private const UPDATABLE_DELEGATE_PERM = [
        2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 32, 33];
}
