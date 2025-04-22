<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use Illuminate\Support\Facades\Auth;

class StartupController extends Controller
{
    public function GetStartupInfos(){
        $myStartup = Startup::where('user_id', Auth::id())->first();
        return view('entreprenor/mystartup',compact('myStartup'));
    }
    public function AddStartup(){

    }
}
