<?php

namespace App\Models;

use CodeIgniter\Model;

class PruebaModel extends Model
{

    public function direccion($paisId, $departamentoId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_municipios a');
        $builder->select('*');
        $builder->join('co_departamentos b', 'a.departamentoId = b.departamentoId');
        $builder->join('co_pais c', 'c.paisId = b.paisId');
        $builder->where('c.paisId', $paisId);
        $builder->where('b.departamentoId', $departamentoId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }
}
