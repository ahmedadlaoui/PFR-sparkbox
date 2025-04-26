<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use App\Services\GeminiService;

class StartupController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function GetstartupDetails($id)
    {

        $Startup = Startup::findOrFail($id);
        $amountraised = $Sumconfirmed = Offer::where('status', 'confirmed')->sum('amount');
        $insights = nl2br($this->geminiService->getSuggestions($Startup));
        return view('public/deal_details', compact('Startup', 'amountraised', 'insights'));
    }



    private function FilterStartups($filterParam)
    {
        if ($filterParam && $filterParam === 'SortByDate') {
            return startup::orderBy('created_at', 'desc')->get();
        } elseif ($filterParam && $filterParam === 'SortByOffers') {
            return startup::withcount('offers')->orderBy('offers_count', 'desc')->get();
        } else {
            return startup::All();
        }
    }
    public function SearchStartups($SearchValue)
    {
        $SearchedForstartups = startup::Where('description', 'like', "%$SearchValue%")->orWHere('name', 'like', "%$SearchValue%")->orWhere('details', 'like', "%$SearchValue%")->get();
        return response()->json($SearchedForstartups);
    }

    public function GetAllStartupsJson($filterParam)
    {
        return response()->json($this->FilterStartups($filterParam));
    }
    public function RenderDealsPage()
    {
        $AllStartups = $this->FilterStartups(null);
        return view('public/deals', compact('AllStartups'));
    }

    public function GetStartupInfos()
    {
        $myStartup = Startup::where('user_id', Auth::id())->first();
        return view('entreprenor/mystartup', compact('myStartup'));
    }

    public function RegsiterStartup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|string',
            'category' => 'required|in:Technology & Innovation,Health & Wellness,Sustainability & GreenTech,Education & Learning,Finance & Fintech,Lifestyle & Consumer Goods',
            'valuation' => 'required|numeric|min:0',
            'website' => 'required|url|max:255',
            'logo' => 'required|url|max:255',
            'cover' => 'required|url|max:255',
            'funding_goal' => 'required|integer|min:0',
            'monthly_revenue' => 'required|numeric|min:0',
            'gross_margin' => 'required|integer|min:0|max:100',
            'burn_rate' => 'required|integer|min:0',
            'runway' => 'required|integer|min:0',
        ]);

        $NewStartup = new Startup;
        $NewStartup->name = $request->input('name');
        $NewStartup->description = $request->input('description');
        $NewStartup->details = $request->input('details');
        $NewStartup->category = $request->input('category');
        $NewStartup->logo = $request->input('logo');
        $NewStartup->cover = $request->input('cover');
        $NewStartup->valuation = $request->input('valuation');
        $NewStartup->website = $request->input('website');
        $NewStartup->funding_goal = $request->input('funding_goal');
        $NewStartup->monthly_revenue = $request->input('monthly_revenue');
        $NewStartup->gross_margin = $request->input('gross_margin');
        $NewStartup->burn_rate = $request->input('burn_rate');
        $NewStartup->runway = $request->input('runway');
        $NewStartup->user_id = Auth::id();

        $NewStartup->save();

        return redirect()->route('entreprenor.mystartup');
    }

    public function DeleteStartup()
    {
        $myStartup = Startup::where('user_id', Auth::id())->first();

        if ($myStartup) {
            $myStartup->delete();
        }

        return redirect()->route('entreprenor.mystartup');
    }

    public function UpdateStartup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|string',
            'category' => 'required|in:Technology & Innovation,Health & Wellness,Sustainability & GreenTech,Education & Learning,Finance & Fintech,Lifestyle & Consumer Goods',
            'valuation' => 'required|numeric|min:0',
            'website' => 'required|url|max:255',
            'logo' => 'required|url|max:255',
            'cover' => 'required|url|max:255',
            'funding_goal' => 'required|integer|min:0',
            'monthly_revenue' => 'required|numeric|min:0',
            'gross_margin' => 'required|integer|min:0|max:100',
            'burn_rate' => 'required|integer|min:0',
            'runway' => 'required|integer|min:0',
            'startup_id' => 'required|exists:startups,id',
        ]);

        $startup = Startup::findOrFail($request->input('startup_id'));

        // Check if the startup belongs to the authenticated user
        if ($startup->user_id !== Auth::id()) {
            return redirect()->route('entreprenor.mystartup')
                ->with('error', 'You are not authorized to update this startup.');
        }

        $startup->name = $request->input('name');
        $startup->description = $request->input('description');
        $startup->details = $request->input('details');
        $startup->category = $request->input('category');
        $startup->logo = $request->input('logo');
        $startup->cover = $request->input('cover');
        $startup->valuation = $request->input('valuation');
        $startup->website = $request->input('website');
        $startup->funding_goal = $request->input('funding_goal');
        $startup->monthly_revenue = $request->input('monthly_revenue');
        $startup->gross_margin = $request->input('gross_margin');
        $startup->burn_rate = $request->input('burn_rate');
        $startup->runway = $request->input('runway');

        $startup->save();

        return redirect()->route('entreprenor.mystartup')
            ->with('success', 'Startup updated successfully.');
    }

    public function renderHomePage()
    {
        $MosttractionStartups = Startup::with('user')->withCount('offers')->orderBy('offers_count', 'desc')->limit(3)->get();
        $JustLunchedStartups = Startup::orderBy('created_at', 'desc')->limit(3)->get();
        return view('public/home', compact('MosttractionStartups', 'JustLunchedStartups'));
    }
}
