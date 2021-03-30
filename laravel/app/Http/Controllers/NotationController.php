<?php


namespace App\Http\Controllers;


use App\Models\Notation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotationController extends Controller
{

    //Create
    function addNotation(Request $request){ //todo: j'ai oublié de mettre le grade de la notation
        $idUser = Auth::id();
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
            'grade' => $grade
        ]))
            return redirect()->route('Companies');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //READ
    public static function getNotationsById($userId){
        return Notation::where('id_user', $userId)->get();
    }


    public static function getNotationsByCompanyId($companyId){
        $value = Notation::where('id_company', $companyId)->get();
        if($value->First() != null){
            $result = 0;
            $index = 0;
            foreach($value as $gradeNotation){
                $result += $gradeNotation->grade;
                $index++;
            }
            return $result/$index;
        }
        return 0;
    }
}
