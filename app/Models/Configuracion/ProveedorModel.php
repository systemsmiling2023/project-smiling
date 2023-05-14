<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class ProveedorModel extends Model
{

    protected $table = 'in_proveedores';
    protected $primaryKey = 'proveedorId';
    protected $allowedFields = ['proveedorId', 'personaId', 'razonSocial'];

    public function guardarProveedor($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarProveedor($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['proveedorId' => $id]);
    }

    public function actualizarProveedor($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('proveedorId', $id);
        $update = $builder->update($data);
    }

    public function nombreProveedor()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas a');
        $builder->select('
        a.nombres, a.primerApellido, a.segundoApellido, a.tercerApellido, a.personaId 
        ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function mostrarJoin()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('in_proveedores a');
        $builder->select('
        a.proveedorId, a.personaId, b.nombres, b.primerApellido, b.segundoApellido, a.razonSocial
        ');
        $builder->join('pe_personas b','a.personaId = b.personaId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}