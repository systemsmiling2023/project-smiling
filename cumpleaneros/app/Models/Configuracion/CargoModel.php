<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class CargoModel extends Model
{

    protected $table = 'pe_cargo';
    protected $primaryKey = 'cargoId';
    protected $allowedFields = ['cargoId', 'cargo'];

    public function guardarCargo($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarCargo($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['cargoId' => $id]);
    }

    public function actualizarCargo($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('cargoId', $id);
        $update = $builder->update($data);
    }
}
