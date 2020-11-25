<?php

namespace App\Http\Controllers;

use App\PermintaanData;
use Illuminate\Http\Request;
use Alert;
use App\file_data;

class ProsesDataController extends Controller
{
    public function index()
    {

        $data = PermintaanData::where('status', 'Belum di tinjau')->get();
        return view('prosesdata.index', compact('data'));
    }

    public function proses()
    {
        $data = PermintaanData::where('status', 'Menunggu')->get();
        return view('prosesdata.proses', compact('data'));
    }

    public function detailProses($id)
    {
        $data = PermintaanData::with('user')->findOrFail($id);
        $fileData = file_data::with('permintaanData')->where('id_permintaanData', $id)->get();
        return view('prosesdata.showproses', compact('data', 'fileData'));
    }

    public function dataMenunggu($id)
    {
        PermintaanData::findOrFail($id)->update(['status' => 'Menunggu']);
    }

    public function dataDitolak($id)
    {
        $data = file_data::where('id_permintaanData', $id)->count();
        if ($data >= 1) {
            alert()->warning('Gagal', 'Hapus data file sebelum di batalkan');
            return redirect()->route('detail.proses', $id);
        } else {
            PermintaanData::findOrFail($id)->update(['status' => 'Di tolak']);
            alert()->success('Success', 'Di Tolak');
            return redirect()->route('data.masuk');
        }
    }

    public function dataTerkirim()
    {
        $data = PermintaanData::where('status', 'Di setujui')->get();
        return view('prosesdata.filesend', compact('data'));
    }
    public function showDetailDataTerkirim($id)
    {
        $data = PermintaanData::with('data')->findOrFail($id);
        $file = file_data::where('id_permintaanData', $id)->get();
        return view('prosesdata.showfilesend', compact('data', 'file'));
    }
}
