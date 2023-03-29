<?php

namespace App\Models;

use CodeIgniter\Model;

class InteresesModel extends Model
{

    protected $table = 'ex_intereses';
    protected $primaryKey = 'interesId';
    protected $allowedFields = ['interesId', 'nombreInteres'];

    public function guardarInteres($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarInteres($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['interesId' => $id]);
    }

    public function actualizarInteres($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('interesId', $id);
        $update = $builder->update($data);
    }
}
