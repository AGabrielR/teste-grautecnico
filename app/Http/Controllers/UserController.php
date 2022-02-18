<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function relatory(){
        $users = User::all();

        return view('relatorios.usuario',[
            'users' => $users,
        ]);
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('updaters.user')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $request->password = Hash::make($request->password);
        $usuario->update($request->all());

        return view('home');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        redirect()->route('relatoryCat');
    }
}
