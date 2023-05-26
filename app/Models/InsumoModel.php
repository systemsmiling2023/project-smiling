<?php

namespace App\Models;

use CodeIgniter\Model;

class InsumoModel extends Model
{
    protected $table = 'in_compra_detalle';
    protected $primaryKey = 'comDetId';
    protected $allowedFields = ['comDetId', 'cantidad', 'costoUnitario','compraId','fechaCaducidad','uniDetId'];

    public function obtenerElemento(){
        $db = \Config\Database::connect();
        $builder = $db->table('in_compra_detalle a');
        $builder->select('
        a.fechaCaducidad, c.insumo, a.notifAlertas
        ');
        $builder->join('in_unidad_detalle b', 'a.uniDetId = b.uniDetId');
        $builder->join('in_insumos c','c.insumoId = b.insumoId');
        $builder->where('a.fechaCaducidad < CURDATE()');
        $builder->where('a.notifAlertas', 0);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function agregarUnoAlertaInsumo($comDetId, $notifAlertas){
        $db = \Config\Database::connect();
        $updAlertaCitas = $db->table('in_compra_detalle');
        $data = array('notifAlertas' => $notifAlertas);
        $updAlertaCitas->where('comDetId', $comDetId);
        $updAlertaCitas->update($data);
    }

    public function obtenerNotificaciones()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_insumos');
        $cantidadMin = 10; // Cantidad mínima para generar la notificación

        // Consultar los insumos que tienen cantidad actual menor o igual a la cantidad mínima
        $builder->select('*');
        $builder->where('cantidadAct <=', $cantidadMin);
        $datos = $builder->get()->getResultArray();

        return $datos;
    }
}
