<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function usuarioConfig(Request $request)
    {
        $usuario = User::find($request->input('codigo'));
        $usuario->name = $request->input('usuario');
        $usuario->save();

        return redirect()->back()->withErrors($usuario)->withInput();
    }

    public function contraConfig(Request $request)
    {
        $contrasenia = User::find($request->input('codigo'));
        $contrasenia->password = Hash::make( $request->input('password'));
        $contrasenia->save();
            
        return redirect()->back()->withErrors($contrasenia)->withInput();
    }
}
