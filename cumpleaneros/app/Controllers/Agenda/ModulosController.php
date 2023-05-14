<?php

namespace App\Controllers\Agenda;
use App\Controllers\BaseController;
use App\Models\SistemaModel;

class ModulosController extends BaseController
{
    public function dashboard()
    {
        $title = [
            "titulo" => "Smiling | Dashboard"
        ];
        return view('pages/dashboard', $title);
    }

    public function agenda()
    {
        $title = [
            "titulo" => "Smiling | Agenda"
        ];
        return view('modulos/agenda/calendar', $title);
    }

    public function cumpleanero()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Cumpleañeros"
        ];
        $ruta = 'modulos/agenda/cumpleaneros';

        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'pe_personas',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA

        return view($ruta, $title);
    }

    
}
