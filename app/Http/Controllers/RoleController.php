<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

//nuestras librerias y modelos  
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = role::all();
        return view('Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Roles.agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>[
            'required',
            'string',
            'max:255',
            'unique:roles',
            'regex:/^([A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)*$/'
            ] 
            ],[
            'name.required'=>'El campo nombre es requerido',
            'name.string'=>'El campo nombre debe ser una cadena de texto',
            'name.max'=>'El campo nombre debe tener un maximo de 255 caracteres',
            'name.unique'=>'El nombre del rol ya existe',
            'name.regex'=>'El campo nombre debe tener un formato de nombre Ejemplo: Administrador'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $role = new role();
            $role->name=$request->input('name');

            $role->save();
            return redirect()->route('roles.index')->with('status', 'Rol creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        return view('Roles.editar', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>[
            'required',
            'string',
            'max:255',
            'unique:roles',
            'regex:/^([A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)*$/'
            ] 
            ],[
            'name.required'=>'El campo nombre es requerido',
            'name.string'=>'El campo nombre debe ser una cadena de texto',
            'name.max'=>'El campo nombre debe tener un maximo de 255 caracteres',
            'name.unique'=>'El nombre del rol ya existe',
            'name.regex'=>'El campo nombre debe tener un formato de nombre Ejemplo: Administrador'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $role = role::find($id);
            $role->name=$request->input('name');

            $role->update();
            return redirect()->route('roles.index')->with('status', 'Rol creado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = role::find($id);
        $role->delete();
        
        return redirect()->route('roles.index')->with('status', 'Rol eliminado con exito');
    }
}
