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
        $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->get();
        $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
        $comps = Company::get();
        return view('search', ['users' => $users, 'offers' => $offers, 'comps' => $comps, 'radio' => $radio]);
    }

    //READ
    static function readAllG(Request $request) {
        $radio = $request->get('filter');
        $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->get();
        $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
        $comps = Company::get();
        return view('gestion', ['users' => $users, 'offers' => $offers, 'comps' => $comps, 'radio' => $radio]);
    }
}
