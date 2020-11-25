<?php

namespace App\Http\Controllers;

use App\PermintaanData;
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    public function index()
    {
        $permintaanData = PermintaanData::all();

        return view('rekapdata.index', compact('permintaanData'));
    }
}
