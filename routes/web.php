<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Componente;
use App\Models\Visita;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $etiquetas = Componente::pluck('etiqueta');
    $valor = $request->input('valor', '0');
    $argumento = '%' . $request->input('valor', '0') . '%';

    if ($valor != '0') {
        $resumenes = Componente::select('etiqueta', 'titulo', 'resumen')->where('etiqueta', 'LIKE', $argumento)->get();
        return view('welcome', compact('etiquetas','resumenes', 'valor'));
    } else {


        

        // SE COLOCRÁ AQUÍ EL ALGORITMO DEL LOS MÁS BUSCADOS O MÁS COMUNES

    // $hoteles_full = Hotel::get();
 
        //  // SE OBTIENEN LOS REGISTROS DEL USUARIO TRAS INGRESAR POR DIFERENTES HOTELES - REGISTROS ÚNICOS
        //      $data =  Visita::where('user_id',$id )->get();
 
 
        //  // LINK PARA CONECTARME CON EL API FLASK
        //      $url = 'http://192.168.1.7:8000/ruta_flask/';
 
 
        //  // ENVIO UNA SOLICITUD A FLASK - PARA OBTENER LOS 2 TIPOS DE HOTES MÁS VITADOS POR EL USUARIO
        //      $solicitud_1 = Http::get($url,['data' => json_encode($data), 'pasos' => 1]);
         
 
        //  // LA RESPUESTA SE CONVIERTE A UN --ARRAY SIMPLE--> [tipo1 , tipo2]
        //      $respuesta_1 = $solicitud_1->collect();
 
 
        //  // REALIZO UNA CONSULTA A LA BASE DE DATOS - OBTENIENDO TODOS LOS HOTES QUE SEA DEL TIPO --[EL ARRAY ES SU ARGUMENTO]--
        //      $hoteles_recomendados_desorden = Hotel::whereRaw("SUBSTRING(tipo, $respuesta_1[0], 1) = '1' AND SUBSTRING(tipo, $respuesta_1[1], 1) = '1'")->get();
        //      // return dd($hoteles_recomendados_desorden->all());
         
 
 
 
        //  // SE OBTIENEN LOS REGISTROS DEL USUARIO TRAS INGRESAR POR DIFERENTES HOTELES - REGISTROS ÚNICOS
        //      $valoreaciones_hoteles = Resena::get();
 
 
        //  // EL VALOR DE LA CLAVE RUC_HOTEL PASA A EMAIL DEL HOTEL DE ELEMENTO [... 'ruc_hotel' => 'email_hotel'  ...]
        //      foreach ($valoreaciones_hoteles as $valoracion) {
        //          $valoracion['ruc_hotel'] = Hotel::getEmail($valoracion['ruc_hotel']);
        //      }
 
        //  // ENVIO UNA SOLICITUD A FLASK  - PARA ESTABLECER EL RAITING DE CADA HOTEL RECOMENDADO
        //      $solicitud_2 = Http::get($url,['data' => json_encode($valoreaciones_hoteles), 'pasos' => 2]);
         
         
        //  // LA RESPUESTA SE CONVIERTE A UN --DICCIONARIO--> [EMAIL , RAITING]
        //      $respuesta_2 = $solicitud_2->collect();
        //      // return dd($respuesta_2->all());
 
 
        //  // SE AÑADE LA CLAVE Y VALOR [VALORACION : PUNTAJE]
        //      foreach ($hoteles_recomendados_desorden as $valoracion_unica) {
        //          if (  in_array($valoracion_unica['email'], array_keys( $respuesta_2->all() )  )  ) {
        //              $valoracion_unica['valoracion'] = $respuesta_2[$valoracion_unica['email']];
        //          } else {
        //              $valoracion_unica['valoracion'] = 0.0;
        //          }
                 
        //      }
        //      // return dd($hoteles_recomendados_desorden);
 
 
        //  // ENVIO OTRA SOLUCITUD A FLASK - PARA OBTENER LOS HOTELES RECOMENDADOS PARA EL USARIO - SE APLICA EL ALGORITMO DE RECOMENDACIONES EN FLASK
        //      $solicitud_3 = Http::get($url,['data' => json_encode($hoteles_recomendados_desorden), 'pasos' => 3]);
 
 
        //  // SE ALMACENA LA RESPUESTA EN UN --DICCIONARIO--> [correo : raiting]
        //      $respuesta_3 = $solicitud_3->collect();
        //      // return dd($respuesta_3->all());
        // return view('home',compact('hoteles_full', 'respuesta_3'));
        // return view('home',compact('hoteles_full'));






        $resumenes = Componente::select('etiqueta', 'titulo', 'resumen','referencia')->get();
        return view('welcome', compact('etiquetas', 'resumenes'));
    }
    
    
    // return view(dd($etiquetas));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/info/{nombre}', function (string $nombre) {

    if (Auth::check()) {
        $user = Auth::user();
        // El usuario está autenticado, obtenemos su información
        if (Visita::where('email', $user->email)->where('etiqueta', $nombre)->doesntExist())
        {
            $visita = new Visita();
            $visita->email = $user->email;
            $visita->etiqueta = $nombre;
            $visita->save();
        }
    }

    $recientes = Componente::latest('created_at')->take(3)->select('etiqueta', 'titulo' ,'created_at','referencia')->get();


    $contenido = Componente::where('etiqueta', $nombre)->first();
    return view('contenido.info', compact('contenido','recientes'));
})->name('info');

Route::post('/envia/algo', function(Request $request){
    view(dd($request->all()));
})->name('xd');


Route::post('/plantilla', [App\Http\Controllers\ComponenteController::class, 'plantillaConfig'])->name('new-plantilla');
Route::post('/etiqueta', [App\Http\Controllers\ComponenteController::class, 'etiquetaConfig'])->name('new-etiqueta');
Route::post('/resumen', [App\Http\Controllers\ComponenteController::class, 'resumenConfig'])->name('new-resumen');
Route::post('/titulo', [App\Http\Controllers\ComponenteController::class, 'tituloConfig'])->name('new-titulo');
Route::post('/indice', [App\Http\Controllers\ComponenteController::class, 'indiceConfig'])->name('new-indice');
Route::post('/contenido', [App\Http\Controllers\ComponenteController::class, 'contenidoConfig'])->name('new-contenido');
Route::post('/perfil', [App\Http\Controllers\ComponenteController::class, 'perfilConfig'])->name('new-perfil');


Route::post('/usuario', [App\Http\Controllers\Controller::class, 'usuarioConfig'])->name('new-name');
Route::post('/contra', [App\Http\Controllers\Controller::class, 'contraConfig'])->name('new-passw');