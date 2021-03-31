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
        $idUser = Auth::id(); //used to get user id thanks to Auth class
        $idOffer = $request->input("idOffer"); //we get the idOffer that the user has chosen

        $offerInfos = OfferController::tryGettingOfferById($idOffer); //return the list of all offers that have the id $idOffer
        $userWishList = WishListController::getWishListByUserId($idUser); //return the list of all users that have the id $idUser

        foreach ($userWishList as $wishObject) //checking if the user aleady have this offer in his wishlist
            if ($wishObject->id_offer == $idOffer)
                return response('This offer is already in user wishlist..', 400)
                    ->header('Content-Type', 'text/plain');

        if($offerInfos == null || $offerInfos->First() == null || //checking user inputs
            $idOffer == null ||
            !is_numeric($idOffer) || !is_numeric($idUser))
            return response('Wrong input', 400)
                ->header('Content-Type', 'text/plain');

        if(WishList::insert([ //we try to insert all the data in the wishlist table
            'id_user' => $idUser,
            'id_offer' => $offerInfos->First()->id,
            'state' => 0
        ]))
            return redirect()->route('Offers');//If it's a success, we go back on the road and offer
        else
            return response('Wrong input', 500) //otherwise we return an error
                ->header('Content-Type', 'text/plain');


    }

    //Read
    public static function getWishListByUserId($userId){ //returns the list of all the user's wishlists ($userId)
        return WishList::where('id_user', $userId)->get();
    }

    public static function getWishListUser(){ // returns the list of all the user's wishlists (Auth::id())
        $userId = Auth::id();
        $wishes = WishList::join('offer', 'wishlist.id_offer', '=', 'offer.id')->join('company', 'offer.id_company', '=', 'company.id')->where('id_user', $userId)->select('wishlist.*', 'company.name', 'offer.title', 'offer.date', 'offer.duration', 'offer.contact_email')->get();
        return view('profile', ['wishes' => $wishes]);
    }

    public static function getEveryoneList(){ //return the list of all the wishlist
        $wishes = WishList::join('offer', 'wishlist.id_offer', '=', 'offer.id')->join('company', 'offer.id_company', '=', 'company.id')->select('wishlist.*', 'company.name', 'offer.title', 'offer.date', 'offer.duration', 'offer.contact_email')->get();
        return view('profile', ['wishes' => $wishes]);
    }
    public static function isInWishList($offerId) : bool { //check if the user has the $offerId in his wishlist
        $wishList = WishListController::getWishListByUserId(Auth::id());
        foreach ($wishList as $wishObject)
            if ($wishObject->id_offer == $offerId)
                return true;
        return false;
    }

    //Update
    function updateWishListState(Request $request){
        $idUser = Auth::id(); //used to get user id thanks to Auth class
        $idWish = $request->input('WishId'); //we get the WishId that the user has chosen

        if(WishList::where('id_user', '=', $idUser) //we try to update the status of his wishlisted offer
            ->where('id', '=', $idWish)
            ->update([
                'id' => $idWish,
                'id_user' => $idUser,
                'state' => DB::raw('state+1')
            ]))
            return redirect()->route('profile', ['id' => $idUser]); //if it's a success, we go back on the road and offer
        else
            return response('Wrong input', 400)//otherwise we return an error
                ->header('Content-Type', 'text/plain');
    }

    //Delete
    function removeFromWishList(Request $request){
        $idUser = Auth::id(); //used to get user id thanks to Auth class
        $idOffer = $request->input('idOffer'); //we get the idOffer that the user has chosen
        if(WishList::where('id_user', '=', $idUser) //we try to remove this wishlisted offer
            ->where('id_offer', '=', $idOffer)
            ->delete())
            return redirect()->route('Offers'); //if it's a success, we go back on the road and offer
        else
            return response('Wrong user input', 400) //otherwise we return an error
                ->header('Content-Type', 'text/plain');
    }
}
