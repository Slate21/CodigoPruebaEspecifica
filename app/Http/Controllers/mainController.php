<?php

namespace App\Http\Controllers;

use App\Models\informacion_usuario;
use App\Models\tipo_documento;
use App\Models\ubicacion;
use DB;

use Illuminate\Http\Request;

class mainController extends Controller
{
    // Redireccionamientos

    public function RedirigirListaU()
    {
        $ListaUsers = DB::table('informacion_usuario as iu')
            ->JOIN('tipo_documento as td', 'iu.tipo_documento', '=', 'td.id_tipoDocumento')
            ->select(
                'iu.id_usuario',
                'iu.nombre',
                'iu.apellido',
                'td.TDocumento',
                'iu.numero_documento'
            )->orderBy('iu.nombre', 'asc')->simplepaginate(10);
        $tipoDocumento = tipo_documento::get();

        return view('listadeUsuarios', ['listaUsers' => $ListaUsers, 'TipoD' => $tipoDocumento]);
    }

    public function RedirigirMasInformacion($idU)
    {
        $MasInfo =  DB::table('informacion_usuario as iu')
            ->JOIN('tipo_documento as td', 'iu.tipo_documento', '=', 'td.id_tipoDocumento')
            ->JOIN('ubicacion as u', 'u.id_usuario', '=', 'iu.id_Usuario')
            ->select(
                'iu.id_Usuario',
                'iu.nombre',
                'iu.apellido',
                'td.TDocumento',
                'iu.numero_documento',
                'u.id_ubicacion',
                'u.longitud',
                'u.latitud'
            )
            ->where('iu.id_usuario', '=', $idU)
            ->first();
        return view('informacionUsuario', ['MI' => $MasInfo]);
    }

    // Validar formulario agregar usuario
    public function ValidarForm(Request $request)
    {
        //Verificar que el captcha se haya checkeado
        if ($request->input('g-recaptcha-response')) {
            //Insertar Usuario
            $infoUsuario = new informacion_usuario;
            $infoUsuario->nombre = $request->nombre;
            $infoUsuario->apellido = $request->apellido;
            $infoUsuario->tipo_documento = $request->type_document;
            $infoUsuario->numero_documento = $request->NDocumento;
            $infoUsuario->save();
            //Insertar Ubicacion
            $idusuario = informacion_usuario::select('id_Usuario')
                ->where('numero_documento', '=', $request->NDocumento)
                ->where('nombre', '=', $request->nombre)
                ->where('apellido', '=', $request->apellido)->first();
            $ubicacion = new ubicacion;
            $ubicacion->id_usuario = $idusuario->id_Usuario;
            $ubicacion->latitud = $request->longitud;
            $ubicacion->longitud = $request->latitud;
            $ubicacion->save();

            //Redirigir a lista de usuarios
            return view('paginaPrincipal');
        } else {
            return 'No se ha podido insertar ' . $request;
        }
    }

    //Eliminar
    public function eliminar($id){
        //Eliminando ubicacion
        $UB = ubicacion::where('id_usuario', '=', $id)->first();
        $UbD = ubicacion::FindOrFail($UB -> id_ubicacion)->delete();

        //Eliminando usuario
        $InD = informacion_usuario::FindOrFail($id);
        $InD -> delete();
        return view('paginaPrincipal');
    }
    //Editar
    public function redirigirEditar($id){
        $inf = DB::table('informacion_usuario as iu')
        ->JOIN('tipo_documento as td', 'iu.tipo_documento', '=', 'td.id_tipoDocumento')
        ->JOIN('ubicacion as u', 'u.id_usuario', '=', 'iu.id_Usuario')
        ->select(
            'iu.id_Usuario',
            'iu.nombre',
            'iu.apellido',
            'td.TDocumento',
            'iu.numero_documento',
            'u.id_ubicacion',
            'u.longitud',
            'u.latitud',
            'iu.tipo_documento'
        )
        ->where('iu.id_usuario', '=', $id)
        ->first();

        $tipoDocumento = tipo_documento::get();
    return view('editarUsuario', ['info' => $inf, 'TDocumento' => $tipoDocumento]);
    }

    public function EditarCrud(Request $request){
        $Eusuario = informacion_usuario::findOrFail($request -> id);
        $Eusuario -> nombre =  $request -> nombre;
        $Eusuario -> apellido =  $request -> apellido;
        $Eusuario -> tipo_documento =  $request -> TDocumento;
        $Eusuario -> numero_documento =  $request -> NDocumento;
        $Eusuario -> save();
        return view('paginaPrincipal');
    }
}
