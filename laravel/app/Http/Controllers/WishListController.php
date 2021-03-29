<?php


namespace App\Http\Controllers;


use App\Models\Offer;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Log;

class WishListController extends Controller
{
    //Create
    function addToWishList(Request $request){
        $idUser = Auth::id();
        $idOffer = $request->input("idOffer");

        $offerInfos = OfferController::tryGettingOfferById($idOffer);

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
        ])){
            return response('Successfully added offer : ' . $idOffer . ' from ' . $idUser . ' to user wishlist.', 200)
                ->header('Content-Type', 'text/plain');
        }

        else{
            return response('Wrong input', 500)
                ->header('Content-Type', 'text/plain');
        }

    }

    //Read

    public static function getWishListByUserId($userId){
        return WishList::where('id_user', $userId)->get();
    }

    public static function getWishList(){ // ????
        $userId = Auth::id();
        $wishes = WishList::join('offer', 'wishlist.id_offer', '=', 'offer.id')->join('company', 'offer.id_company', '=', 'company.id')->where('id_user', $userId)->select('wishlist.*', 'company.*', 'offer.*')->get();

        return view('home', ['wishes' => $wishes]);
    }

    public static function getEveryoneList(){
        $wishes = WishList::join('offer', 'wishlist.id_offer', '=', 'offer.id')->join('company', 'offer.id_company', '=', 'company.id')->select('wishlist.*', 'company.*', 'offer.*')->get();

        Log::debug($wishes);

        return view('home', ['wishes' => $wishes]);
    }
    public static function isInWishList($offerId) : bool {
        $wishList = WishListController::getWishListByUserId(Auth::id());
        foreach ($wishList as $wishObject)
            if ($wishObject->id_offer == $offerId)
                return true;
        return false;
    }
    //Update
    function updateWishListState(Request $request){ // attention ici on ne check pas si l'idOffer existe dans l'id user a voir si on a le temps de le faire
        //state++;
        $idUser = Auth::id();
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
        $idUser = Auth::id();
        $idOffer = $request->input('idOffer');
        if(WishList::where('id_user', '=', $idUser)
            ->where('id_offer', '=', $idOffer)
            ->delete())
            return redirect()->route('');
        else
            return response('Wrong user input', 400)
                ->header('Content-Type', 'text/plain');
    }
}
