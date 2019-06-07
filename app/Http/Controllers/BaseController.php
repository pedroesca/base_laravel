<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
 
    public function index()
    {
        // VISTA PRINCIPAL (LISTA)  Display a listing of the resource.
    }


    public function create()
    {
        //VISTA DE CREACIÓN * Show the form for creating a new resource.
    }

    
    public function store(Request $request)
    {
        //INSERTAR REGISTROS EN BD - Store a newly created resource in storage.
    }

    
    public function show($id)
    {
        //ver UN registro
    }

    public function edit($id)
    {
        // vista de EDICIÓN * Show the form for editing the specified resource.
    }

    public function update(Request $request, $id)
    {
        // actualizar datos en BD - Update the specified resource in storage.
    }

    public function destroy($id)
    {
        // BORRAR un registro de la BD - * Remove the specified resource from storage.
    }
}
