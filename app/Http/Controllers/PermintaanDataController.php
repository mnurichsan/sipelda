<?php

namespace App\Http\Controllers;

use App\file_data;
use App\PermintaanData;
use App\Sektoral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class PermintaanDataController extends Controller
{
    public function index()
    {
        $sektorals = Sektoral::all();
        $permintaanData = PermintaanData::where('id_user', Auth::user()->id)->get();
        return view('permintaandata.index', compact('sektorals', 'permintaanData'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'sektoral' => 'required',
            'tujuan' => 'required',
            'checkbox' => 'accepted'
        ], [
            'accepted' => "Silahkan membaca dan centang terlebih dahulu"
        ]);

        $data = [
            'id' =>  Uuid::generate(4),
            'title' => $request->title,
            'id_sektoral' => $request->sektoral,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan,
            'id_user' => Auth::user()->id,
            'tanggal_pengajuan' => now(),
            'status' => 'Belum di tinjau'
        ];

        PermintaanData::create($data);
        alert()->success('Success', 'Data di tambahkan');
        return redirect()->route('permintaan.index');
    }

    public function delete($id)
    {
        PermintaanData::findOrFail($id)->delete();
        alert()->success('Success', 'Data di delete');
        return redirect()->route('permintaan.index');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|min:3',
            'sektoral' => 'required',
            'tujuan' => 'required'
        ]);

        $data = [
            'title' => $request->title,
            'id_sektoral' => $request->sektoral,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan
        ];

        PermintaanData::findOrFail($id)->update($data);
        alert()->success('Success', 'Data di update');
        return redirect()->route('permintaan.index');
    }
}
