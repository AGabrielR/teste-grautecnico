<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Categoria;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoria::all();
        return view('createClient', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = $request->all();

        Cliente::create($cliente);
        
        return redirect()->route('home');    
    }

    public function relatory(){
        $clientes = DB::table('clientes')
                       ->join('categorias', 'clientes.categoria_id', '=', 'categorias.id')
                       ->orderByRaw('clientes.id ASC')
                       ->get(['clientes.id as id', 'name', 'categoriaNome', 'profile']);
        $qtdClienteCat = DB::table('clientes')
                        ->select(DB::raw('count(*) as categoria_id'))
                        ->groupBy('categoria_id')
                        ->get();

        $categorias = Categoria::all();
        
        return view('relatorios.cliente',[
            'clientes' => $clientes,
            'qtdClienteCat' => $qtdClienteCat,
            'categorias' => $categorias,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $categories = Categoria::all();

        return view('updaters.client',[
            'cliente' => $cliente,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('relatoryClient');
    }
}
