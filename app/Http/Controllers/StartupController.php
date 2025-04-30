<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\GeminiService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Monolog\Handler\WebRequestRecognizerTrait;

class StartupController extends Controller
{
    use AuthorizesRequests;
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function GetstartupDetails($id)
    {
        $Startup = Startup::findOrFail($id);
        $amountraised = $Sumconfirmed = Offer::where('status', 'confirmed')->sum('amount');
        return view('public/deal_details', compact('Startup', 'amountraised'));
    }
    public function GetInsights($id){
        $Startup = Startup::findOrFail($id);
        $insights = nl2br($this->geminiService->getSuggestions($Startup));
        return response()->json($insights);
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
        $SearchedForstartups = startup::Where('description', 'like', "%$SearchValue%")->orWHere('name', 'like', "%$SearchValue%")->get();
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
        $this->authorize('create', Startup::class);

        $validationRules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|string',
            'category' => 'required|in:Technology & Innovation,Health & Wellness,Sustainability & GreenTech,Education & Learning,Finance & Fintech,Lifestyle & Consumer Goods',
            'valuation' => 'required|numeric|min:0',
            'website' => 'required|url|max:255',
            'funding_goal' => 'required|integer|min:0',
            'monthly_revenue' => 'required|numeric|min:0',
            'gross_margin' => 'required|integer|min:0|max:100',
            'burn_rate' => 'required|integer|min:0',
            'runway' => 'required|integer|min:0',
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        $request->validate($validationRules);

        $NewStartup = new Startup;
        $NewStartup->name = $request->input('name');
        $NewStartup->description = $request->input('description');
        $NewStartup->details = $request->input('details');
        $NewStartup->category = $request->input('category');
        $NewStartup->valuation = $request->input('valuation');
        $NewStartup->website = $request->input('website');
        $NewStartup->funding_goal = $request->input('funding_goal');
        $NewStartup->monthly_revenue = $request->input('monthly_revenue');
        $NewStartup->gross_margin = $request->input('gross_margin');
        $NewStartup->burn_rate = $request->input('burn_rate');
        $NewStartup->runway = $request->input('runway');
        $NewStartup->user_id = Auth::id();

        if ($request->hasFile('logo_image')) {
            $logoPath = $request->file('logo_image')->store('startup-logos', 'public');
            $NewStartup->logo = $logoPath;
        }

        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('startup-covers', 'public');
            $NewStartup->cover = $coverPath;
        }

        $NewStartup->save();

        return redirect()->route('entreprenor.mystartup');
    }

    public function DeleteStartup(Request $request)
    {
        $startupId = $request->input('startup_id');
        $myStartup = Startup::findOrFail($startupId);

        $this->authorize('delete', $myStartup);

        if ($myStartup->logo && !filter_var($myStartup->logo, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($myStartup->logo);
        }

        if ($myStartup->cover && !filter_var($myStartup->cover, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($myStartup->cover);
        }

        $myStartup->delete();

        return redirect()->route('entreprenor.mystartup');
    }

    public function UpdateStartup(Request $request)
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|string',
            'category' => 'required|in:Technology & Innovation,Health & Wellness,Sustainability & GreenTech,Education & Learning,Finance & Fintech,Lifestyle & Consumer Goods',
            'valuation' => 'required|numeric|min:0',
            'website' => 'required|url|max:255',
            'funding_goal' => 'required|integer|min:0',
            'monthly_revenue' => 'required|numeric|min:0',
            'gross_margin' => 'required|integer|min:0|max:100',
            'burn_rate' => 'required|integer|min:0',
            'runway' => 'required|integer|min:0',
            'startup_id' => 'required|exists:startups,id',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $request->validate($validationRules);

        $startup = Startup::findOrFail($request->input('startup_id'));

        $this->authorize('update', $startup);

        $startup->name = $request->input('name');
        $startup->description = $request->input('description');
        $startup->details = $request->input('details');
        $startup->category = $request->input('category');
        $startup->valuation = $request->input('valuation');
        $startup->website = $request->input('website');
        $startup->funding_goal = $request->input('funding_goal');
        $startup->monthly_revenue = $request->input('monthly_revenue');
        $startup->gross_margin = $request->input('gross_margin');
        $startup->burn_rate = $request->input('burn_rate');
        $startup->runway = $request->input('runway');

        if ($request->hasFile('logo_image')) {
            if ($startup->logo && !filter_var($startup->logo, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($startup->logo);
            }

            $logoPath = $request->file('logo_image')->store('startup-logos', 'public');
            $startup->logo = $logoPath;
        }

        if ($request->hasFile('cover_image')) {
            if ($startup->cover && !filter_var($startup->cover, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($startup->cover);
            }

            $coverPath = $request->file('cover_image')->store('startup-covers', 'public');
            $startup->cover = $coverPath;
        }

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
