<?php


namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Offer;
use App\Models\OfferPromo;
use App\Models\WishList;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{
    function registerOffer(Request $request){

        $companyName = $request->input("idCompany");
        $title = $request->input("title");
        $competences = $request->input("competences");
        $date = $request->input("date");
        $endDate = $request->input("endDate");
        $remuneration = $request->input("remuneration");
        $slots = $request->input("slots");

        $companyInfos = Company::where('name', $companyName); //CompanyController::tryGettingCompany($idCompany);

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
            return redirect()->route('Offers');
        else
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');


    }

    //Read
    static function readAll() {
        $offers = Offer::join('company', 'offer.id_company', '=', 'company.id')->get();
        Log::debug($offers);
        return view('search', ['offers' => $offers]);
    }

    public static function tryGettingOfferById($offerId) {
        return Offer::where('id', $offerId)->get();
    }

    public static function tryGettingOffer($id) {
        $offerInfos = Offer::where('id', $id)->get();
        if($offerInfos == null || $offerInfos->First() == null)
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');
        else
            return view('offer.update', ['offer' => $offerInfos->First()]);

    }

    //Update
    /*function preCompleteUpdateForm(Request $request) {

        $offer = self::tryGettingOffer($request->input('id'));

        return view('offer.update', ['offer' =>$offer]);
    }*/


    function updateOffer(Request $request){

        $idOffer = $request->input("idOffer");
        $newIdCompany = $request->input("idCompany");
        $newTitle = $request->input("title");
        $newCompetences = $request->input("competences");
        $newDate = $request->input("date");
        $newEndDate = $request->input("endDate");
        $newRemuneration = $request->input("remuneration");
        $newSlots = $request->input("slots");
        $companyInfos = CompanyController::tryGettingCompany($newIdCompany);

        if($companyInfos == null || $companyInfos->First() == null ||
            $newTitle == null || $newCompetences == null ||$newDate == null || $newEndDate == null || $newRemuneration == null || $newSlots==null ||
            !is_numeric($newSlots) || !is_numeric($newRemuneration))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');


        $origin = new DateTime($newDate);
        $offerEndDate = new DateTime($newEndDate);
        $interval = $origin->diff($offerEndDate);

        $offerInfos = OfferController::tryGettingOfferById($idOffer);
        if($offerInfos == null || $offerInfos->First() == null)
            return response('This offer id doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');

              if($offerInfos->First()->update([
                  'id_company' => $companyInfos->First()->id,
                  'title' => $newTitle,
                  'competences' =>  $newCompetences,
                  'date' =>  $newDate,
                  'duration' =>  $interval->format('%a'),
                  'remuneration' =>  $newRemuneration,
                  'slots' =>  $newSlots
              ]))
                    return redirect()->route('Offers');
              else
                  return response('Wrong input', 500)
                      ->header('Content-Type', 'text/plain');

    }

    //Delete
    function deleteOfferById(Request $request) {
        $offerId = $request->input('idOffer');
        OfferPromo::where('id_offer', $offerId)->delete();
        WishList::where('id_offer', $offerId)->delete();


        if(Offer::where('id', $offerId)->delete())
            return redirect()->route('Offers');
         else
             return response('Wrong user input', 400)
                  ->header('Content-Type', 'text/plain');
    }
}
