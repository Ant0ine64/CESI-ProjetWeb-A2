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
    //Create
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

    //Read
    public static function tryGettingCompany($companyId) {
        return Company::where('id', $companyId)->get();
    }


    //Update

    function updateCompany(Request $request){
        $idCompany = $request->input("companyId");
        $newName = $request->input("name");
        $newAddress = $request->input("address");
        $newActivitySector = $request->input("activitySector");
        $newInternsNumber = $request->input("internsNumber");

        if($newName == null || $newAddress == null ||$newActivitySector == null || $newInternsNumber == null || !is_numeric($newInternsNumber))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');

        $companyInfos = Company::where('id', $idCompany);
        if($companyInfos == null || $companyInfos->First() == null)
            return response('This company id doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');


        if($companyInfos->First()->update([
            'name' => $newName,
            'address' => $newAddress,
            'activity_sector' =>  $newActivitySector,
            'interns_number' => $newInternsNumber
        ]))
            return response('Succesfully updated company !', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //Delete
    function deleteCompanyById(Request $request) {
        $companyId = $request->input('idCompany');
        Company::where('id', $companyId)->delete();
        return response('Successfully deleted company : ' .$companyId, 200)
            ->header('Content-Type', 'text/plain');
    }

}

