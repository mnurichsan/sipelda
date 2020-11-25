<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    public function show()
    {
        try {
            $client = new Client();
            $request = $client->get('https://restcountries.eu/rest/v2/all');
            $response = $request->getBody()->getContents();

            $data = json_decode($response);

            foreach ($data as $value) {
                $negara[] = ['name' => $value->name];
            }
            return view('profile.show', compact('negara'));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function showDetail($id)
    {
        $user = User::findOrFail($id);

        return view('profile.showdetail', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'jenis_identitas' => 'required',
            'no_identitas' => 'required',
            'instansi_organisasi' => 'required',
            'no_telp' => 'required',
            'no_wa' => 'required',
            'negara' => 'required'
        ]);



        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jenis_identitas' => $request->jenis_identitas,
            'no_identitas' => $request->no_identitas,
            'instansi_organisasi' => $request->instansi_organisasi,
            'nip' => $request->nip,
            'unit_kerja' => $request->unit_kerja,
            'no_telp' => $request->no_telp,
            'no_wa' => $request->no_wa,
            'negara' => $request->negara
        ];


        User::findOrFail($id)->update($data);
        alert()->success('Success', 'Data di update');
        return redirect()->route('profile.show');
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required',
            'kpassword' => 'required'
        ]);

        $password = [
            'password' => bcrypt($request->password)
        ];

        if ($request->password != $request->kpassword) {
            alert()->warning('Warning', 'Password tidak sama');
            return redirect()->route('profile.show');
        } else {
            User::findOrFail($id)->update($password);
            alert()->success('Success', 'Data terupdate');
            return redirect()->route('profile.show');
        }
    }
}
