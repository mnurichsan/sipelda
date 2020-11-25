<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Alert;

class UsersController extends Controller
{
    public function adminIndex()
    {
        $admin =  User::where('id_role', 1)->get();

        return view('users.admin', compact('admin'));
    }

    public function tambahAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'no_telp' => '0',
            'id_role' => 1,
            'negara' => 'indonesia',
            'jenis_identitas' => 'admin',
            'no_identitas' => '1',
            'instansi_organisasi' => 'diskominfo',

        ];

        User::create($admin);
        alert()->success('Success', 'Data di tambahkan');
        return redirect()->route('admin.index');
    }

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $input = $request->all();

        if ($request->has('password')) {
            $input['password'] = bcrypt($request->password);
        }
        User::findOrFail($id)->update($input);
        alert()->success('Success', 'Data di update');
        return redirect()->route('admin.index');
    }

    public function destroyAdmin($id)
    {
        User::findOrFail($id)->delete();
        alert()->success('Success', 'Data di hapus');
        return redirect()->route('admin.index');
    }

    //member

    public function memberIndex()
    {
        $members = User::where('id_role', 2)->get();

        return view('users.member', compact('members'));
    }
}
