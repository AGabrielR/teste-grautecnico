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

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('relatoryCat');
    }
}
