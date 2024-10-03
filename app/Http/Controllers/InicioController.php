<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\ParticipanteTicket;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\TipoServicio;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        // $tipo_servicios = TipoServicio::where('estado',1)->get();
        $tipo_servicios = TipoServicio::where('estado', 1)->take(6)->get();

        $cantidad_publicaciones =  Publicacion::where('estado_proceso_id',2)->count();

        $publicaciones_recientes = Publicacion::where('estado_proceso_id', 2)->orderBy('id', 'desc')
        ->take(5)->get();

        
        $servicios = Servicio::where('estado', 1)->get();


        return view('portal.menu.index',compact('tipo_servicios','cantidad_publicaciones','publicaciones_recientes','servicios'));
    }


    public function politicasPrivacidad(){


        return view('portal.politicas-privacidad.index');
    }
    public function terminosCondiciones(){


        return view('portal.terminos-condiciones.index');
    }



    public function sorteoIndex(){

        $participantes= Participante::all();
        $participantes_tickets= ParticipanteTicket::all();


        // return $participantes_tickets;

        return view('sorteos.index', compact('participantes_tickets'));




    }

    public function consultarContribuyente(Request $request){


        $participante = Participante::where('persona_id', $request->persona_id)->first();
    
    

        return response()->json([
            'estado'=> 200,
            'data'=> $participante
        ],200);
    
    }


}
