<?php


namespace App\Http\Controllers;

use App\Models\Offer;
use DateTime;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    function registerOffer(Request $request){

        $idCompany = $request->input("idCompany");
        $title = $request->input("title");
        $competences = $request->input("competences");
        $date = $request->input("date");
        $endDate = $request->input("endDate");
        $remuneration = $request->input("remuneration");
        $slots = $request->input("slots");

        $companyInfos = CompanyController::tryGettingCompany($idCompany);

        if($companyInfos == null || $companyInfos->First() == null ||
            $title == null || $competences == null ||$date == null || $endDate == null || $remuneration == null || $slots==null ||
            !is_numeric($slots) || !is_numeric($remuneration))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');


        $origin = new DateTime($date);
        $offerEndDate = new DateTime($endDate);
        $interval = $origin->diff($offerEndDate);

        if(Offer::insert([
            'id_company' => $companyInfos->First()->id,
            'title' => $title,
            'competences' =>  $competences,
            'date' =>  $date,
            'duration' =>  $interval->format('%a'),
            'remuneration' =>  $remuneration,
            'slots' =>  $slots
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');

    }
}
