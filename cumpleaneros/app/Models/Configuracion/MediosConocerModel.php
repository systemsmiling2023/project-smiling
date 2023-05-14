<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class MediosConocerModel extends Model
{
    protected $table = 'co_medios_conocer';
    protected $primaryKey = 'medioId';
    protected $allowedFields = ['medioId', 'medio', 'estado'];

    public function guardarMediosConocer($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarMediosConocer($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['medioId' => $id]);
    }

    public function medio($medio) {
        
        $query = $this->db->query("SELECT medioId from co_medios_conocer where medio = '$medio'");
        return $query->getRow();
    }

    public function actualizarMedioConocer($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('medioId', $id);
        $update = $builder->update($data);
    }




}