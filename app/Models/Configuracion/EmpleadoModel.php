<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{

    protected $table = 'pe_empleados';
    protected $primaryKey = 'empleadoId';
    protected $allowedFields = ['empleadoId', 'fechaIngreso', 'estado','cargoId','personaId'];

    public function guardarEmpleado($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarEmpleado($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['empleadoId' => $id]);
    }

    public function actualizarEmpleado($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('empleadoId', $id);
        $update = $builder->update($data);
    }

    public function nombreEmpleado()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas a');
        $builder->select('
        a.nombres, a.primerApellido, a.segundoApellido, a.tercerApellido, a.personaId 
        ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function nombreCargo()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_cargo b');
        $builder->select('
            b.cargoId, b.cargo
        ');
        $datos = $builder->get()->getResultArray();
        return $datos;

    }

    public function mostrarJoin()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_empleados a');
        $builder->select('
        a.empleadoId, a.empleadoId, a.fechaIngreso, a.estado, b.nombres, b.primerApellido, b.segundoApellido, c.cargo
        ');
        $builder->join('pe_personas b','a.personaId = b.personaId');
        $builder->join('pe_cargo c','a.cargoId = c.cargoId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}