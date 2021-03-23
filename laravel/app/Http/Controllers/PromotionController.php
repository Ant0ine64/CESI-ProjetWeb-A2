<?php


namespace App\Http\Controllers;


use App\Models\Center;
use App\Models\Promotion;
use App\Models\UserPromotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    //J'ai changé le date de pomo en int vu qu'on a besoin que de l'année
    // a voir si sbyte serait pas mieux
    //Create

    function addPromotion(Request $request){
        $year = $request->input("year");
        $speciality = $request->input("speciality");
        $idCenter = $request->input("idCenter");

        if(!is_numeric($idCenter) || !is_numeric($year) || strlen($year) != 4)
            return response('Wrong input..', 400)
                ->header('Content-Type', 'text/plain');

        //Checking if center exists

        $centerInfos = PromotionController::tryGettingCenter($idCenter);
        if($centerInfos == null || $centerInfos->First() == null)
            return response('This center doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');

        if(Promotion::insert([
            'year' => $year,
            'speciality' => $speciality,
            'id_center' => $idCenter
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');

    }

    function addUserInPromotion(Request $request){
        $idPromo = $request->input("idPromo");
        $idUser = $request->input("idUser");

        if(!is_numeric($idPromo) || !is_numeric($idUser))
            return response('Wrong input..', 400)
                ->header('Content-Type', 'text/plain');

        //Checking if user exists :

        $userInfos = UserController::tryGettingUserById($idUser);
        if($userInfos == null || $userInfos->First() == null)
            return response('This user doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');

        //Checking if promotion exists :

        $promoInfos = PromotionController::tryGettingPromotion($idPromo);
        if($promoInfos == null || $promoInfos->First() == null)
            return response('This promotion doesnt exist..', 400)
                ->header('Content-Type', 'text/plain');

        if(UserPromotion::insert([
            'id_promo' => $idPromo,
            'id_user' => $idUser
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //Read

    public static function tryGettingPromotion($promoId) {
        return Promotion::where('id', $promoId)->get();
    }

    public static function tryGettingUserPromotion($userId) {
        return UserPromotion::where('id_user', $userId)->get();
    }

    public static function tryGettingCenter($centerId) { //as there isnt CenterController we are declaring this function in promotion
        return Center::where('id', $centerId)->get();
    }
}
