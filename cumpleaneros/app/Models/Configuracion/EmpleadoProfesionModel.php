<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class EmpleadoProfesionModel extends Model
{

    protected $table = 'co_empleado_profesion';
    protected $primaryKey = 'empProfId';
    protected $allowedFields = ['empProfId', 'empleadoId', 'profesionId'];

    public function guardarEmpleadoProfesion($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarEmpleadoProfesion($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['empProfId' => $id]);
    }

    public function actualizarEmpleadoProfesion($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('empProfId', $id);
        $update = $builder->update($data);
    }

    public function Empleado()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_empleados a');
        $builder->select('
        a.empleadoId, a.fechaIngreso, a.estado, b.nombres, b.primerApellido, b.segundoApellido, c.cargo');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function Profesion()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_profesiones');
        $builder->select('*');
        $datos = $builder->get()->getResultArray();
        return $datos;

    }

    public function EmpleadoProfesionJoin($empleadoId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_empleado_profesion a');
        $builder->select('
        a.empProfId, d.empleadoId, b.nombres, b.primerApellido, c.profesionId, c.profesion'
        );
        $builder->join('pe_empleados d','d.empleadoId = a.empleadoId');
        $builder->join('pe_personas b','b.personaId = d.personaId');
        $builder->join('co_profesiones c','a.profesionId = c.profesionId');
        $builder->where('a.empleadoId', $empleadoId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function validarExistencia($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_empleado_profesion');
        $builder->select('*');
        $builder->where('empleadoId', $data['empleadoId']);
        $builder->where('profesionId', $data['profesionId']);

        $numRows = $builder->get()->getNumRows();

        
        if($numRows>1){
            return false;
        }else{
            return true;
        }
    }

}