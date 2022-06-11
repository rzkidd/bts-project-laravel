<?php

namespace App\Http\Controllers;

use App\Models\Bts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Monitoring;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function bts()
    {
        return view('dashboard.data.dataBTS', [
            'data_bts' => Bts::all()
        ]);
    }

    public function operator()
    {
        return view('dashboard.data.dataOperator');
    }
    
    public function monitoring(Request $request)
    {
        if($request->bts){
            return view('dashboard.data.dataMonitoring', [
                'monitorings' => Monitoring::where('bts_id', $request->bts)->get(),
                'data_bts' => Bts::all(),
            ]);
        }
        return view('dashboard.data.dataMonitoring', [
            'monitorings' => Monitoring::all(),
            'data_bts' => Bts::all()
        ]);
    }
    
    public function maps()
    {
        return view('dashboard.maps.MapsBTS');
    }
}
