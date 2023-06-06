<?php

namespace App\Controllers\Expediente;
use App\Controllers\BaseController;
use App\Models\SistemaModel;

class ModulosController extends BaseController
{
    public function expediente()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Expedientes"
        ];
        $ruta = 'modulos/expediente/expediente';

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
    
    public function paciente()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Pacientes"
        ];
        $ruta = 'modulos/expediente/paciente';

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