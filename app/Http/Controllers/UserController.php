<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $request->validate([
           'FirstName' => 'required|max:20',
           'SecondName' => 'max:20',
           'FirstLastName' => 'required|max:20',
           'SecondLastName' => 'max:20',
           'StatusUser' => 'required',
           'email' => 'required',
           'password' => 'required',
           'PasswordConfim' => 'required'
        ]);

        $password = Hash::make($request->password);
        $request->merge([
            'password' => $password,
        ]);

        $user = User::create($request->all());
        return redirect()->route('users.index')->with([
            'response' => 'Se ha creado el usuario de '.$request->FirstName,
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ] );
    }
    public function edit($id){
        $users = User::find($id);

        return view('users.edit',compact('users'));
    }
    public function update(Request $request, $id){
        $user = User::find($id)->update($request->all());
        return redirect()->route('users.index')->with([
            'response' => 'Se ha actualizado el usuario '.$request->FirstName,
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }
    public function show($id){
        $users = User::find($id);
        return view('users.show',compact('users'));
    }
}
