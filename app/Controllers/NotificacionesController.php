<?php

namespace App\Controllers;

use App\Models\SessionModel;
use App\Models\SistemaModel;
use App\Models\NotificacionModel;


class NotificacionesController extends BaseController
{
    protected $request;
    protected $db;
    protected $bitacora;

    public function caducos()
    {
        $notificacion = new NotificacionModel();
        $sistema = new SistemaModel();

        $data['insumo'] = $notificacion->obtenerElemento();

        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_compra_detalle',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($data)
        );
        $sistema->guardarBitacora($regBitacora);

        return $this->response->setJSON($data);
        return $data;
    }

    public function contarAlertas()
    {
        $notificacion = new NotificacionModel();
        $sistema = new SistemaModel();

        $id = $this->request->getPost('id');
        $datoActualizar = $id;
        //$notifAlertas = $this->getPost('notifAlertas');
        $data = [
            'notifAlertas' => $this->request->getPost('notifAlertas')
        ];

        $detalleBitacora = array();
        $detalleBitacora['dato_anterior'] = $datoActualizar;
        $detalleBitacora['dato_nuevo'] = $data;
        $detalleBitacora = json_encode($detalleBitacora);

        // GUARDAR EN BITACORA
        $regBitacora = array(
            'idMovimiento' => 6,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => $id,
            'tablaRelacionada' => 'in_compra_detalle',
            'usuario' => session('usuarioId'), 
            'detalle' => $detalleBitacora
        );

        if(intval($data['notifAlertas']) < 4){
            $notifAlertas = intval($data['notifAlertas']) + 1 ;
            $notificacion->agregarUnoAlertaInsumo($id, $notifAlertas);
            $sistema->guardarBitacora($regBitacora);
        } 
        
        return $notificacion;
    }

    public function obtenerNotificaciones()
    {
        $notificacion = new NotificacionModel();
        $sistema = new SistemaModel();

        // Verificar si el usuario tiene el rol de administrador
        if (session('rolId') === '1') {
            // Obtener los datos de las notificaciones desde modelo
            $notificaciones = $notificacion->obtenerNotificaciones();

            $detalleBitacora = array();
            $detalleBitacora[] = $notificaciones;
            $detalleBitacora = json_encode($detalleBitacora);

            // GUARDAR EN BITACORA
            $regBitacora = array(
                'idMovimiento' => 8,
                'fechaHora' => date('Y-m-d H:i:s'),
                'idTabla' => 0,
                'tablaRelacionada' => 'in_insumos',
                'usuario' => session('usuarioId'), 
                'detalle' => $detalleBitacora
            );

            $sistema->guardarBitacora($regBitacora);
            
            // Devolver las notificaciones como respuesta AJAX
            return $this->response->setJSON($notificaciones);
        } else {
            // Si el usuario no tiene el rol de administrador, devolver una respuesta vacía
            return $this->response->setJSON([]);
        }        
    }

    public function expirados()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Insumos Vencidos"
        ];
        $ruta = 'modulos/configuracion/insumosVencidos';
        
        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'in_compra_detalle',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA  

        return view($ruta, $title);
    }

}
