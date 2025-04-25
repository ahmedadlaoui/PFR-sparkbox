<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function CreateOffer($id){

        request()->validate([
            'amount' => 'required|integer|min:500'
        ]);

        $NewOffer = new Offer;
        $NewOffer->amount = request('amount');
        $NewOffer->user_id = Auth::id();
        $NewOffer->startup_id = $id;
        $NewOffer->save();

        return redirect()->route('details',['id' => $id]);
    }
    public function GetMyoffers(){
        $MyOffers = Offer::Where('user_id',Auth::id())->get();
        return view('investor/dashboard',compact('MyOffers'));
    }
    public function GetStartupInvestors(){
        $startup = Startup::where('user_id', Auth::id())->firstOrFail();
        $Investors = Offer::Where('startup_id',$startup->id)
        ->orderByDesc('amount')
        ->get();
        return view('entreprenor/investors',compact('Investors'));
    }

}
