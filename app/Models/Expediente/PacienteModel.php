<?php

namespace App\Models\Expediente;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    protected $table = 'ex_pacientes';
    protected $primaryKey = 'pacienteId';
    protected $allowedFields = ['pacienteId', 'codPaciente', 'estado','personaId'];

    public function guardarPaciente($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarPaciente($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['pacienteId' => $id]);
    }

    public function actualizarPaciente($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('pacienteId', $id);
        $update = $builder->update($data);
    }

    public function nombrePaciente()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pe_personas a');
        $builder->select(' * ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function nombreMedio()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_medios_conocer b');
        $builder->select(' * ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function nombreInteres()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_intereses c');
        $builder->select(' * ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function nombrePatologia()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_patologias d');
        $builder->select(' * ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function responsables()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_responsable e');
        $builder->select(' * ');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function PacienteJoin()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_pacientes a');
        $builder->select('
        a.pacienteId, a.codPaciente, a.estado, b.nombres, b.primerApellido, c.medioId, g.medio, d.interesId, h.nombreInteres, e.patologiaId, i.patologia, f.nombres
        ');
        $builder->join('pe_personas b','b.personaId = a.personaId');
        $builder->join('co_paciente_medio c','c.pacienteId = a.pacienteId');
        $builder->join('co_medios_conocer g','g.medioId = c.medioId');
        $builder->join('ex_interes_paciente d','d.pacienteId = a.pacienteId');
        $builder->join('ex_intereses h','h.interesId = d.interesId');
        $builder->join('ex_patologias_paciente e','e.pacienteId = a.pacienteId');
        $builder->join('ex_patologias i','i.patologiaId = e.patologiaId');
        $builder->join('ex_responsable f','f.pacienteId = a.pacienteId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }
}