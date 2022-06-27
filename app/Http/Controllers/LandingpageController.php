<?php

namespace App\Http\Controllers;

use App\Models\Bts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LandingpageController extends Controller
{
    public function index(Request $request)
    {   
        return view('landing');
    }

    public function view_bts()
    {
        return view('user_view.bts', [
            'data_bts' => Bts::latest()->get()
        ]);
    }
}
