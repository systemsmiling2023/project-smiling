<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class TipoContactoModel extends Model
{

    protected $table = 'co_tipo_contacto';
    protected $primaryKey = 'tipoContId';
    protected $allowedFields = ['tidoContId', 'tipoContacto'];

    public function guardarContacto($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarContacto($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['tipoContId' => $id]);
    }

    public function actualizarContacto($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('tipoContId', $id);
        $update = $builder->update($data);
    }
}
