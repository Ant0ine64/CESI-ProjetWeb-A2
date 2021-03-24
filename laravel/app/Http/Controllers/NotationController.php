<?php


namespace App\Http\Controllers;


use App\Models\Notation;
use Illuminate\Http\Request;

class NotationController extends Controller
{

    //Create
    function addNotation(Request $request){ //todo: j'ai oublié de mettre le grade de la notation
        $idUser = "4"; //todo: get this ID by using User Model
        $idCompany = $request->input("idCompany");
        $grade = $request->input("grade");

        $companyInfos = CompanyController::tryGettingCompany($idCompany);

        if(!is_numeric($grade) ||  $grade <0 || $grade > 5)
            return response('This grade isnt valid..', 400)
                ->header('Content-Type', 'text/plain');

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
            'grade' => 0
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
