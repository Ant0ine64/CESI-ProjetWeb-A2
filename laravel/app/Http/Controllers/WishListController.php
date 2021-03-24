<?php


namespace App\Http\Controllers;


use App\Models\Offer;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class WishListController extends Controller
{
    //Create
    function addToWishList(Request $request){
        $idUser = "4"; //todo: get this ID by using User Model
        $idOffer = $request->input("idOffer");

        $offerInfos = OfferController::tryGettingOffer($idOffer);

        $userWishList = WishListController::getWishListByUserId($idUser);

        foreach ($userWishList as $wishObject) // todo: remove cette merde et mettre ->where()->where()
            if ($wishObject->id_offer == $idOffer)
                return response('This offer is already in user wishlist..', 400)
                    ->header('Content-Type', 'text/plain');

        if($offerInfos == null || $offerInfos->First() == null ||
            $idOffer == null ||
            !is_numeric($idOffer) || !is_numeric($idUser))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');

        if(WishList::insert([
            'id_user' => $idUser,
            'id_offer' => $offerInfos->First()->id,
            'state' => 0
        ]))
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
    }

    //Read

    public static function getWishListByUserId($userId){
        return WishList::where('id_user', $userId)->get();
    }

    //Update
    function updateWishListState(Request $request){ // attention ici on ne check pas si l'idOffer existe dans l'id user a voir si on a le temps de le faire
        //state++;
        $idUser = "4"; //todo: get this ID by using User Model
        $idOffer = $request->input('idOffer');
        if(WishList::where('id_user', '=', $idUser)
            ->where('id_offer', '=', $idOffer)
            ->update([
                'id_user' => $idUser,
                'id_offer' => $idOffer,
                'state' => DB::raw('state+1')
            ]))
            return response('Successfully updated offer : ' . $idOffer . ' from ' . $idUser . ' wishlist.', 200)
                ->header('Content-Type', 'text/plain');
        else
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');
    }

    //Delete
    function removeFromWishList(Request $request){
        $idUser = "4"; //todo: get this ID by using User Model
        $idOffer = $request->input('idOffer');
        if(WishList::where('id_user', '=', $idUser)
            ->where('id_offer', '=', $idOffer)
            ->delete())
        return response('Successfully removed offer : ' . $idOffer . ' from ' . $idUser . ' wishlist.', 200)
            ->header('Content-Type', 'text/plain');
        else
            return response('Wrong user input', 400)
                ->header('Content-Type', 'text/plain');
    }
}
