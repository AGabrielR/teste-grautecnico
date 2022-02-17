<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function relatory(){
        $users = User::all();

        return view('relatorios.usuario',[
            'users' => $users,
        ]);
    }

    public function edit($id){
        $usuario = User::findOrFail($id);

        return view('updaters.user')->with('usuario', $usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());

        return view('relatorios.usuario');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        redirect()->route('relatoryCat');
    }
}
