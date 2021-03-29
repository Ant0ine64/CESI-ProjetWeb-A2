<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Type;
use App\Models\Center;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

use function Psy\debug;

class SearchController extends Controller
{
    //READ
    static function readAllU(Request $request) {
        $search = $request->input('searchbar');

        if ($search == ''){
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->paginate(5);
        }
        elseif ($search != ''){
            $users = User::where('firstname', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('login', 'like', '%'.$search.'%')->orWhere('city', 'like', '%'.$search.'%')->orWhere('type', 'like', '%'.$search.'%')->join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->paginate(5);
        };

        return view('users', ['users' => $users]);
    }

    //READ
    static function readAllC(Request $request) {
        $search = $request->input('searchbar');

        if($search == ''){
            $comps = Company::paginate(5);
        }
        elseif($search != ''){
            $comps = Company::where('name', 'like', '%'.$search.'%')->orWhere('address', 'like', '%'.$search.'%')->orWhere('activity_sector', 'like', '%'.$search.'%')->paginate(5);
        };

        return view('companies', ['comps' => $comps]);
    }

    //READ
    static function readAllO(Request $request) {
        $search = $request->input('searchbar');

        if($search == ''){
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->select('offer.*', 'company.name', 'company.address', 'company.activity_sector', 'company.interns_number', 'company.is_visible')->paginate(5);
        }
        elseif($search != ''){
            $offers = Offer::where('title', 'like', '%'.$search.'%')->orWhere('competences', 'like', '%'.$search.'%')->orWhere('date', 'like', '%'.$search.'%')->orWhere('duration', 'like', '%'.$search.'%')->join('company', 'offer.id_company', '=', 'company.id')->select('offer.*', 'company.name', 'company.address', 'company.activity_sector', 'company.interns_number', 'company.is_visible')->paginate(5);
        };

        return view('offers', ['offers' => $offers]);
    }
}
