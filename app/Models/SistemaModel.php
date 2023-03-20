<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

// date_default_timezone_set('America/El_Salvador');

class SistemaModel extends Model
{

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('bi_bitacoras');
    }

    public function bitacora($idMov, $usuario, $detalle = '', $id = '', $tabla = '')
    {
        $data['idMovimiento'] = $idMov;
        $data['fechaHora'] = date('Y-m-d H:i:s');
        $data['idTabla'] = $id;
        $data['tablaRelacionada'] = $tabla;
        $data['usuario'] = $usuario;
        $data['detalle'] = $detalle;

        $this->builder->insert($data);
    }
}
