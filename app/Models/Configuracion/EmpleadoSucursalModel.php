<?php

namespace App\Models\Configuracion;

use CodeIgniter\Model;

class EmpleadoSucursalModel extends Model
{

    protected $table = 'co_empleado_sucursal';
    protected $primaryKey = 'empSucId';
    protected $allowedFields = ['empSucId', 'empleadoId','sucursalId', 'esEncargado'];

    public function guardarEmpSuc($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarEmpSuc($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['empSucId' => $id]);
    }

    public function actualizarEmpSuc($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('empSucId', $id);
        $update = $builder->update($data);
    }

    public function Empleado()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_empleados a');
        $builder->select('
        a.empleadoId, a.fechaIngreso, a.estado, b.nombres, b.primerApellido, b.segundoApellido 
        ');
        $builder->join('pe_personas b','a.personaId = b.personaId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function Sucursal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_sucursales c');
        $builder->select('
        *
        ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function showSucursal($empleadoId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_empleado_sucursal a');
        $builder->select('
        a.empSucId, d.empleadoId, b.nombres, b.primerApellido, c.sucursalId, c.referencia, a.esEncargado
        ');
        $builder->join('pe_empleados d', 'd.empleadoId = a.empleadoId');
        $builder->join('pe_personas b', 'b.personaId = d.personaId ');
        $builder->join('co_sucursales c', 'a.sucursalId = c.sucursalId');
        $builder->where('a.empleadoId', $empleadoId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function EmpleadoSucursalJoin($empleadoId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_empleado_sucursal a');
        $builder->select('
        a.empSucId, d.empleadoId, b.nombres, b.primerApellido, c.sucursalId, c.referencia, a.esEncargado'
        );
        $builder->join('pe_empleados d','d.empleadoId = a.empleadoId');
        $builder->join('pe_personas b','b.personaId = d.personaId');
        $builder->join('co_sucursales c','a.sucursalId = c.sucursalId');
        $builder->where('a.empleadoId', $empleadoId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}