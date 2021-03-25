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

class SearchController extends Controller
{
    //READ
    static function readAll() {
        $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->get();
        $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
        $comps = Company::get();
        return view('search', ['users' => $users, 'offers' => $offers, 'comps' => $comps]);
    }

    //READ
    static function readAllG() {
        $users = User::join('center', 'user.id_center', '=', 'center.id')->join('type', 'user.id_type', '=', 'type.id')->get();
        $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
        $comps = Company::get();
        return view('gestion', ['users' => $users, 'offers' => $offers, 'comps' => $comps]);
    }
}
