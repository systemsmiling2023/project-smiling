<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class MedicamentoModel extends Model
{

    protected $table = 'ex_medicamentos';
    protected $primaryKey = 'medicamentoId';
    protected $allowedFields = ['medicamentoId', 'medicamento'];

    public function guardarMedicamento($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarMedicamento($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['medicamentoId' => $id]);
    }

    public function actualizarMedicamento($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('medicamentoId', $id);
        $update = $builder->update($data);
    }


}