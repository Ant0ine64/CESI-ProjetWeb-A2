<?php


namespace App\Http\Controllers;


use App\Models\Center;
use App\Models\Company;
use App\Models\Offer;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    function registerCompany(Request $request){

        $name = $request->input("name");
        $address = $request->input("address");
        $activitySector = $request->input("activitySector");
        $internsNumber = $request->input("internsNumber");

        if($name == null || $address == null ||$activitySector == null || $internsNumber == null || !is_numeric($internsNumber))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');

        if(Company::insert([
            'name' => $name,
            'address' => $address,
            'activity_sector' =>  $activitySector,
            'interns_number' => $internsNumber
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');

    }

    public static function tryGettingCompany($companyId) {
        return Company::where('id', $companyId)->get();
    }


}
