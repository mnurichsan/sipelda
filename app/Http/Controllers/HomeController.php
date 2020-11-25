<?php

namespace App\Http\Controllers;

use App\Charts\PermohonanDataChart;
use App\Feedback;
use App\PermintaanData;
use App\Sektoral;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataMasuk = PermintaanData::all()->count();
        $dataProses = PermintaanData::where('status', 'Menunggu')->count();
        $dataTerkirim = PermintaanData::where('status', 'Di setujui')->count();
        $jumlahUser = User::where('id_role', 2)->count();

        $sektorals = Sektoral::all();
        foreach ($sektorals as $value) {
            $labels[] = $value->name;
            $data[] = $value->permintaanData->count();
        }

        // return $data;
        $chart = new PermohonanDataChart;
        $chart->labels($labels);
        $chart->dataset('Data Permohonan', 'bar', $data)->backgroundColor('blue');

        $feedback = Feedback::take(5)->get();


        return view('home', compact('dataMasuk', 'dataProses', 'dataTerkirim', 'jumlahUser', 'chart', 'feedback'));
    }

    public function about()
    {
        return view('setting.about');
    }
}
