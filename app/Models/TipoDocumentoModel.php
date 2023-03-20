<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoDocumentoModel extends Model
{

    protected $table = 'co_tipo_documento';
    protected $primaryKey = 'tipoDocId';
    protected $allowedFields = ['tidoDocId', 'tipoDocumento'];

    public function guardarDocumento($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarDocumento($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['tipoDocId' => $id]);
    }

    public function actualizarDocumento($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('tipoDocId', $id);
        $update = $builder->update($data);
    }
}
