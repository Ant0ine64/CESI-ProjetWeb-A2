<?php


namespace App\Http\Controllers;


use App\Models\Center;
use App\Models\Company;
use App\Models\Offer;
use App\Models\Type;
use App\Models\User;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'interns_number' => $internsNumber,
            'is_visible' => 1
        ])){
            return redirect()->route('Companies');
        }
        
        else{
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
        }
    }

    //Read
    public static function tryGettingCompany($companyId) {
        return Company::where('id', $companyId)->get();
    }

    public static function tryGettingCompanies() {
        return Company::All();
    }
    //Update
    function preCompleteUpdateForm(Request $request) {

        $company = self::tryGettingCompany($request->input('id'));

        return view('company.update', ['company' => $company]);
    }


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
            'interns_number' => $newInternsNumber,
            'is_visible' => DB::raw('is_visible')
        ])){

            return redirect()->route('Companies');
        }

        else{
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
        }
    }


    public static function toggleCompanyState($companyId) {
        if(Company::where('id', $companyId)->update([
            'is_visible' => DB::raw('1 - is_visible')
        ]))
            return response('Succesfully toggled company state!', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //Delete
    function deleteCompanyById(Request $request) {
        $companyId = $request->input('idCompany');
        if(Company::where('id', $companyId)->delete())
            return response('Successfully deleted company : ' .$companyId, 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong user input', 400)
                ->header('Content-Type', 'text/plain');
    }

}

