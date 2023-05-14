<?php
namespace App\Models\Agenda;

use CodeIgniter\Model;

class CumpleanerosModel extends Model
{
    protected $table = 'pe_personas';
    protected $primaryKey = 'personaId';
    protected $allowedFields = ['personaId', 'nombres', 'primerApellido', 'segundoApellido','tercerApellido',
                'fechaNacimiento','municipioId','detalleDireccion','sexo','comentarios','estado', 'tipoPersona'];

    public function cumplePorMes($mes)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas a');
        $builder->select('a.nombres, a.primerApellido, a.fechaNacimiento');
        $builder->select("CASE 
                            WHEN b.personaId IS NOT NULL THEN 'empleado' 
                            WHEN c.personaId IS NOT NULL THEN 'paciente' 
                            WHEN d.personaId IS NOT NULL THEN 'proveedor'
                            ELSE ''
                        END as categoria");
        $builder->join('pe_empleados b','a.personaId = b.personaId','left');
        $builder->join('ex_pacientes c','c.personaId = a.personaId','left');
        $builder->join('in_proveedores d','d.personaId = a.personaId', 'left');
        $builder->where('MONTH(a.fechaNacimiento)', $mes);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }
}