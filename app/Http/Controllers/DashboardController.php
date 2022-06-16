<?php

namespace App\Http\Controllers;

use App\Models\Bts;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'jumlah_monitoring' => Monitoring::all()->count(),
            'activities' => RecentActivity::latest('at')->take(5)->get()
        ]);
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
