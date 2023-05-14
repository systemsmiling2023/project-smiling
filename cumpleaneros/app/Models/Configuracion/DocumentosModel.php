<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class DocumentosModel extends Model
{
    protected $table = 'co_documentos';
    protected $primaryKey = 'documentoId';
    protected $allowedFields = ['documentoId', 'tipoDocId', 'documento', 'personaId'];

    public function mostrar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_documentos doc');
        $builder->select('
                    doc.documentoId AS documentoId,
                    tdoc.tipoDocumento AS tipoDocumento,
                    doc.documento AS documento,
                    doc.personaId AS personaId');      
        $builder->join('co_tipo_documento tdoc', 'tdoc.tipoDocId = doc.tipoDocId');
        $builder->where('doc.personaId', $id);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function mostrarTipoDocumento()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_tipo_documento');
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        return $query;  
    }

    public function guardarDocumento($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function consultar($documento,$personaId) {
        
        $query = $this->db->query("SELECT COUNT(documentoId) AS numDocumento from co_documentos where tipoDocId = '$documento' AND personaId = '$personaId'");
        return $query->getRow("numDocumento");
    }

    
    public function actualizarDocumento($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('documentoId', $id);
        $update = $builder->update($data);
    }

    public function eliminarDoc($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['documentoId' => $id]);
    }



}