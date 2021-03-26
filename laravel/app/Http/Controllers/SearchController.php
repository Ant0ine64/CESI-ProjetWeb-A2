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
    static function readAll(Request $request) {
        $radio = $request->get('filter');
        $search = $request->input('searchbar');
    
        if ($radio == 'users' && $search == ''){
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
            $comps = Company::get();
        }
        elseif ($radio == 'users' && $search != ''){
            $users = User::where('firstname', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('login', 'like', '%'.$search.'%')->orWhere('city', 'like', '%'.$search.'%')->orWhere('type', 'like', '%'.$search.'%')->join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
            $comps = Company::get();
        };
        
        if($radio == 'offers' && $search == ''){
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
            $comps = Company::get();
        }
        elseif($radio == 'offers' && $search != ''){
            $offers = Offer::where('title', 'like', '%'.$search.'%')->orWhere('competences', 'like', '%'.$search.'%')->orWhere('date', 'like', '%'.$search.'%')->orWhere('duration', 'like', '%'.$search.'%')->join('company', 'offer.id_company', '=', 'company.id')->get();
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $comps = Company::get();
        };

        if($radio == 'companies' && $search == ''){
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
            $comps = Company::get();
        }
        elseif($radio == 'companies' && $search != ''){
            $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->select('user.*', 'center.city', 'type.type')->get();
            $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
            $comps = Company::where('name', 'like', '%'.$search.'%')->orWhere('address', 'like', '%'.$search.'%')->orWhere('activity_sector', 'like', '%'.$search.'%')->get();
        };
        
        return view('search_', ['users' => $users, 'offers' => $offers, 'comps' => $comps, 'radio' => $radio]);
    }
}
