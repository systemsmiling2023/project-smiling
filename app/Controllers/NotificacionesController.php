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
        
        $data['insumo'] = $notificacion->obtenerElemento();
        return $this->response->setJSON($data);
        return $data;
    }

    public function contarAlertas()
    {
        $notificacion = new NotificacionModel();
        $id = $this->request->getPost('id');
        //$notifAlertas = $this->getPost('notifAlertas');
        $data = [
            'notifAlertas' => $this->request->getPost('notifAlertas')
        ];
        if(intval($data['notifAlertas']) < 4){
            $notifAlertas = intval($data['notifAlertas']) + 1 ;
            $notificacion->agregarUnoAlertaInsumo($id, $notifAlertas);
        } 
        
        return $notificacion;
    }

    public function obtenerNotificaciones()
    {
        $notificacion = new NotificacionModel();

        // Obtener los datos de las notificaciones desde modelo
        $notificaciones = $notificacion->obtenerNotificaciones();

        // Devolver las notificaciones como respuesta AJAX
        return $this->response->setJSON($notificaciones);
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
