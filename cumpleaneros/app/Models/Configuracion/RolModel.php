<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class RolModel extends Model
{

    protected $table = 'co_roles';
    protected $primaryKey = 'rolId';
    protected $allowedFields = ['rolId', 'rol','descripcion','estado'];

    public function guardarRol($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarRol($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['rolId' => $id]);
    }

    public function actualizarRol($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('rolId', $id);
        $update = $builder->update($data);
    }
}
