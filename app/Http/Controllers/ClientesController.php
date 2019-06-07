<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientesModel;
use App\Http\Requests\ClientesRequest;

class ClientesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = ClientesModel::all();
        return view('clientes.clientes',compact('clientes'));
    }


    // Show the form for creating a new resource.
    public function create()
    {
        return view('clientes.cliente-ne');
    }


    public function store(ClientesRequest $request)
    {
        //dd($request->all());
        $cliente = ClientesModel::create($request->all());

    }

    
    public function show($id)
    {
        //
    }

    // cargar los datos que vamos a mostrar (desde la BD)
    public function edit($id)
    {
        $clientes = ClientesModel::findOrFail($id);
        return view('clientes.cliente-ne',compact('clientes'));
    }

    
    public function update(ClientesRequest $request)
    {
        $clientes = ClientesModel::findOrFail($request->id);
        //dd($clientes);
        $clientes->update($request->all());
        //return back()->with('update', 'Cliente modificado exitosamente');
        return redirect()->route('clientes.index')->with('update', 'Cliente modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $clientes = ClientesModel::findOrFail($request->id);
        $clientes->delete();
        return redirect()->route('clientes.index')->with('delete', 'Cliente eliminado exitosamente');
    }
}
