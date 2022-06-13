<?php

use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitoringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('/bts', [DashboardController::class, 'bts']);
    Route::get('/operator', [DashboardController::class, 'operator']);
    // Route::get('/monitoring', [DashboardController::class, 'monitoring']);
    Route::get('/maps', [DashboardController::class, 'maps']);

    // crud monitoring
    Route::resource('/monitoring', MonitoringController::class)->except('update');
    Route::put('/monitoring', function (Request $request) {
        $validatedData = $request->validate([
            'tahun' => 'required|min:4|max:4',
            'bts_id' => 'required',
            'tgl_kunjungan' => 'required',
            'kondisi_bts_id' => 'required',
            'user_surveyor_id' => 'required'
        ]);

        $validatedData['edited_by'] = auth()->user()->id;

        $bts = DB::select("select nama from bts where id = $request->bts_id");
        $activity = [
            'user_id' => auth()->user()->id,
            'action' => 'edit',
            'object' => 'monitoring on ' . $bts[0]->nama
        ];

        RecentActivity::create($activity);

        Monitoring::where('id', $request->id)->update($validatedData);

        return redirect('/monitoring')->with('success', 'Data updated!');
    });
});
