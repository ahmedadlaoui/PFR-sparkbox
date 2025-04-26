<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function CreateOffer($id)
    {

        request()->validate([
            'amount' => 'required|integer|min:500',
            'offer_message' => 'required|string|max:60'
        ]);

        $NewOffer = new Offer;
        $NewOffer->amount = request('amount');
        $NewOffer->offer_message = request('offer_message');
        $NewOffer->user_id = Auth::id();
        $NewOffer->startup_id = $id;
        $NewOffer->save();

        return redirect()->route('details', ['id' => $id]);
    }
    public function GetMyoffers()
    {
        $MyOffers = Offer::Where('user_id', Auth::id())->get();
        $Sumconfirmed = Offer::Where('user_id',Auth::id())->where('status', 'confirmed')->sum('amount');
        $SumInNegotioation = Offer::Where('user_id',Auth::id())->where('status', 'in negotiation')->sum('amount');
        $startupsCount = Offer::where('user_id', Auth::id())
                      ->distinct('startup_id')
                      ->count('startup_id');
        
        return view('investor/dashboard', compact('MyOffers','Sumconfirmed','SumInNegotioation','startupsCount'));
    }
    public function GetStartupInvestors()
    {
        $startup = Startup::where('user_id', Auth::id())->firstOrFail();
        $Investors = Offer::Where('startup_id', $startup->id)
            ->orderByDesc('amount')
            ->get();
        return view('entreprenor/investors', compact('Investors'));
    }

    public function DeleteOffer()
    {
        Offer::findOrFail(request('offer_id'))->delete();
        return redirect()->route('investor.dashboard');
    }

    public function UpdateOfferStatus(){
       $OffertoUpdate = Offer::findOrFail(request('offer_toupdate'));
       $OffertoUpdate->status = request('status');
       $OffertoUpdate->save();
       return redirect()->route('entreprenor.investors');
    }
}
