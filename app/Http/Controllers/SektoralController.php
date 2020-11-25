<?php

namespace App\Http\Controllers;

use App\Sektoral;
use Illuminate\Http\Request;
use Alert;


class SektoralController extends Controller
{

    public function index(Request $request)
    {
        $sektoral = Sektoral::all();
        return view('sektoral.index', compact('sektoral'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:25'
        ]);

        $sektoral = [
            'name' => $request->name
        ];

        Sektoral::create($sektoral);
        alert()->success('Success', 'Data di tambahkan');
        return redirect()->route('sektoral.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:25'
        ]);

        $sektoral = [
            'name' => $request->name
        ];

        Sektoral::FindOrFail($id)->update($sektoral);
        return redirect()->route('sektoral.index')->withSuccess('Data berhasil di update');
    }

    public function delete($id)
    {
        Sektoral::findOrFail($id)->delete();
        alert()->success('Success', 'Data di hapus');
        return redirect()->route('sektoral.index');
    }
}
