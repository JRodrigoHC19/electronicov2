<?php

namespace App\Http\Controllers;


use App\Models\Componente;

use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function plantillaConfig(Request $request)
    {
        $newArticulo = new Componente();
        $newArticulo->etiqueta = $request->input('new-etiqueta');
        $newArticulo->email = $request->input('email');
        $newArticulo->titulo = 'Aquí va el titulo interesante';
        $newArticulo->resumen = 'Aquí va el resumen.';
        $newArticulo->indice = 'Aquí va el índice.';
        $newArticulo->contenido = 'Aquí va el contenido';
        $newArticulo->referencia = '...';
        $newArticulo->save();

        // return view(dd($newArticulo->etiqueta));
        return redirect('info/'. $request->input('new-etiqueta'));
    }

    public function etiquetaConfig(Request $request)
    {
        $eti_upd = Componente::find($request->codigo);
        $eti_upd->etiqueta = $request->input('etiqueta');
        $eti_upd->save();
        
        return redirect('info/'. $request->input('etiqueta'));
    }


    public function resumenConfig(Request $request)
    {
        $res_upd = Componente::find($request->codigo);
        $res_upd->resumen = $request->input('resumen');
        $res_upd->save();

        return redirect()->back()->withErrors($res_upd)->withInput();
    }


    public function tituloConfig(Request $request)
    {
        $tit_upd = Componente::find($request->codigo);
        $tit_upd->titulo = $request->input('titulo');
        $tit_upd->save();

        return redirect()->back()->withErrors($tit_upd)->withInput();
    }


    public function indiceConfig(Request $request)
    {
        $ind_upd = Componente::find($request->codigo);
        $ind_upd->indice = $request->input('indice');
        $ind_upd->save();
        return redirect()->back()->withErrors($ind_upd)->withInput();
    }


    public function contenidoConfig(Request $request)
    {
        $con_upd = Componente::find($request->codigo);
        $con_upd->contenido = $request->input('contenido');
        $con_upd->save();
        return redirect()->back()->withErrors($con_upd)->withInput();
    }

    
    public function perfilConfig(Request $request)
    {
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/fotos'), $imageName);



            $fot_upd = Componente::find($request->codigo);
            $fot_upd->referencia = $imageName;
            $fot_upd->save();

            return redirect()->back()->withErrors($fot_upd)->withInput();
        
            // Aquí puedes realizar acciones adicionales, como guardar la ruta en la base de datos
        }
    
        // return redirect()->back()->with('success', 'Imagen subida exitosamente.');
    }
}
