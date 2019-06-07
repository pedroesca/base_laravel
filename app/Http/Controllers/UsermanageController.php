<?php

namespace App\Http\Controllers;

use App\Model\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsermanageController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->hasRole('admin'))
        {
        $usuarios = User::with('roles')->get();
        $roles = Roles::all();
        //return $usuarios;

        return view('private.usuarios', compact('usuarios', 'roles'));
        }

        return view('theme.lte.inicio');
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
        //
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->iduser==null) {

            $data = $request->all();
            //dd($data);
            $rules = array(
                'password_actual' => 'required|min:6|current_password',
                'password' => 'confirmed|min:6'
            );

            $v = Validator::make($data, $rules);

            if($v->fails())
            {
                return response()->json(['errors'=>$v->errors()->all()]);
            }else
            {
                return back()->with('flash', 'La contraseña se cambio correctamente.');
                // $user = User::findOrFail($request->idusu);
                // $user->update(['password' => Hash::make($request['password'])]);
            }

        }else{
            $user = User::findOrFail($request->iduser);
            //dd($user);
            $user->roles()->detach(Roles::where('id', $request->idrolold)->first());
            $user->update($request->all());
            $user->roles()->attach(Roles::where('id', $request->idrol)->first());
            return back()->with('flash', 'El usuario se creo correctamente.');
        }
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
        $user = User::findOrFail($request->iduser);//esta linea me trae el usuario que pedí
        $user->delete();//esta linea me elimina el usuario
        $user->roles()->detach(Roles::where('id', $request->idrol)->first());//esta linea me elimina el rela_rol, es decir el registro en la tabla relacionada
        return back();//me retorna a la vista anterior


    }
}
