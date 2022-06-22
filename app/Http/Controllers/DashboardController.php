<?php

namespace App\Http\Controllers;

use App\Models\Bts;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LoginLog;

class DashboardController extends Controller
{
    public function index()
    {
        $timeNow = date('H:i:s');
        $time30MinutesEarlier = date('H:i:s', (strtotime($timeNow) - (30 * 60)));
        $still_online = LoginLog::where('is_online', true);
        $online = LoginLog::whereTime('created_at', '<=', $timeNow)
                    ->whereTime('created_at', '>=', $time30MinutesEarlier)
                    ->union($still_online)
                    ->get();

        return view('dashboard.index', [
            'jumlah_monitoring' => Monitoring::all()->count(),
            'activities' => RecentActivity::latest('at')->take(5)->get(),
            'online_users' => $online
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

    public function profile()
    {
        return view('dashboard.profile.index');
    }
}
