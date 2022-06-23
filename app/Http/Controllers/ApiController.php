<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function chart()
    {
        $result = DB::select('select tahun, count(tahun) as jumlah from monitorings group by tahun');
        return response()->json($result);
    }

    public function monitoring_data(Request $request)
    {
        $result = DB::select("select id, tahun, bts_id, tgl_kunjungan, kondisi_bts_id, user_surveyor_id from monitorings where id = $request->id");
        return response()->json($result);
    }

    public function kuesioner_data(Request $request)
    {
        $result = DB::select("select id, pertanyaan from kuesioners where id = $request->id");
        return response()->json($result);
    }
}
