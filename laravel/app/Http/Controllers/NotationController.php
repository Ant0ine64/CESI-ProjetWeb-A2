<?php


namespace App\Http\Controllers;


use App\Models\Notation;
use Illuminate\Http\Request;

class NotationController extends Controller
{

    //Create
    function addNotation(Request $request){
        $idUser = "4"; //todo: get this ID by using User Model
        $idCompany = $request->input("idCompany");

        $companyInfos = CompanyController::tryGettingCompany($idCompany);

        if($companyInfos == null || $companyInfos->First() == null ||
            !is_numeric($idUser) || !is_numeric($idCompany))
            return response('This company doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');


        $userNotations = NotationController::getNotationsById($idUser);

        foreach ($userNotations as $notationObject)
            if ($notationObject->id_company == $idCompany)
                return response('This user already vouched this company..', 400)
                    ->header('Content-Type', 'text/plain');


        if(Notation::insert([
            'id_company' => $companyInfos->First()->id,
            'id_user' => $idUser,
            'grade' => 0 //todo: find the meaning of grade in this context? permissionId?
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //Update

    public static function getNotationsById($userId){
        return Notation::where('id_user', $userId)->get();
    }
}
