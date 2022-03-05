<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('created_at', 'DESC')->get();

        return view('users.index', compact('users'));
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
        // validacion del form por backend
        $rules = [
            'name_user' => 'required',
            'doc_type' => 'required',
            'doc_num' => 'required',
            'address' => 'required',
            'date' => 'required'  
        ];
        $messages = [
            'name_user.required' => 'El nombre es requerido.',
            'doc_type.required' => 'El tipo de documento es requerido.',
            'doc_num.required' => 'El número de documento es requerido.',
            'address.required' => 'La dirección es requerida.',
            'date.required' => 'La fecha de nacimiento es requerida.',
            
        ];
        $this->validate($request, $rules, $messages);

        // se guarda el registro en la BD
        $user = new User();
        $user->name = $request->name_user;
        $user->document_type = $request->doc_type;          
        $user->document_number = $request->doc_num;
        $user->address = $request->address;
        $user->date_birth = $request->date;
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'registrado');
        
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
        $user = User::FindOrFail($id);
        
        return view('users.edit', compact('user'));
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
        // validacion del form por backend
        $rules = [
            'name_user' => 'required',
            'doc_type' => 'required',
            'doc_num' => 'required',
            'address' => 'required',
            'date' => 'required'  
        ];
        $messages = [
            'name_user.required' => 'El nombre es requerido.',
            'doc_type.required' => 'El tipo de documento es requerido.',
            'doc_num.required' => 'El número de documento es requerido.',
            'address.required' => 'La dirección es requerida.',
            'date.required' => 'La fecha de nacimiento es requerida.',
            
        ];
        $this->validate($request, $rules, $messages);

        // se guarda el registro en la BD
        $user = User::FindOrFail($id);
        $user->name = $request->name_user;
        $user->document_type = $request->doc_type;          
        $user->document_number = $request->doc_num;
        $user->address = $request->address;
        $user->date_birth = $request->date;
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();

        return redirect()->route('usuarios.index')->with('success', 'eliminado');
    }
}
