<?php
namespace App\Models\Agenda;

use CodeIgniter\Model;

class CumpleanerosModel extends Model
{
    protected $table = 'pe_personas';
    protected $primaryKey = 'personaId';
    protected $allowedFields = ['personaId', 'nombres', 'primerApellido', 'segundoApellido','tercerApellido',
                'fechaNacimiento','municipioId','detalleDireccion','sexo','comentarios','estado', 'tipoPersona'];

    public function Sucursal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_sucursales');
        $builder->select('
        *
        ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function cumplesXSucursal($sucursalId, $mes)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas a');
        $builder->select('
        a.nombres, a.primerApellido, a.fechaNacimiento, b.personaId, c.sucursalId
        ');
        $builder->join('pe_empleados b','a.personaId = b.personaId');
        $builder->join('co_empleado_sucursal c','b.empleadoId=c.empleadoId');
        $builder->join('co_sucursales d','d.sucursalId = c.sucursalId');
        $builder->where('MONTH(a.fechaNacimiento)', $mes);
        $builder->where('c.sucursalId', $sucursalId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }
}