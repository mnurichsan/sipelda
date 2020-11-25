<?php

namespace App\Http\Controllers;

use App\file_data;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Alert;
use App\PermintaanData;

class FileDataController extends Controller
{
    public function store(Request $request, $id)
    {
        try {

            $this->validate($request, [
                'data' => 'required',
                'show_at' => 'required',
                'end_at' => 'required'
            ]);

            $file = $request->data;
            $fileName =  time() . $file->getClientOriginalName();
            $file->move('uploads', $fileName);

            $fileData = [
                'id' => Uuid::generate(4),
                'id_permintaanData' => $id,
                'data' => $fileName,
                'show_at' => $request->show_at,
                'end_at' => $request->end_at
            ];

            file_data::create($fileData);
            alert()->success('Success', 'Data di tambahkan');
            return redirect()->route('detail.proses', $id);
        } catch (\Throwable $th) {
            return  alert()->success('Success', $th);
        }
    }

    public function update(Request $request, $dataId, $id)
    {
        $this->validate($request, [
            'data' => 'required',
            'show_at' => 'required',
            'end_at' => 'required'
        ]);

        if ($request->has('data')) {

            $data = file_data::select('data')->where('id', $id)->first();
            $file_path = "uploads/$data->data";
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->data;
            $fileName =  time() . $file->getClientOriginalName();
            $file->move('uploads', $fileName);

            $fileData = [
                'data' => $fileName,
                'show_at' => $request->show_at,
                'end_at' => $request->end_at
            ];
        } else {
            $fileData = [
                'show_at' => $request->show_at,
                'end_at' => $request->end_at
            ];
        }
        file_data::findOrFail($id)->update($fileData);
        alert()->success('Success', 'Data di update');
        return redirect()->route('detail.proses', $dataId);
    }

    public function delete($dataId, $id)
    {
        $data = file_data::select('data')->where('id', $id)->first();
        $file_path = "uploads/$data->data";
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        file_data::findOrFail($id)->delete();
        alert()->success('Success', 'Data di hapus');
        return redirect()->route('detail.proses', $dataId);
    }

    public function kirimData($id)
    {
        $statusKirim = [
            'status' => 'Di setujui'
        ];

        PermintaanData::findOrFail($id)->update($statusKirim);
        alert()->success('Success', 'Data Terkirim');
        return redirect()->route('data.proses', $id);
    }
}
