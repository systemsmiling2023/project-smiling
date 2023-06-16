<?php

namespace App\Models\Expediente;

use CodeIgniter\Model;

class PacienteInteresModel extends Model
{
    protected $table = 'ex_interes_paciente';
    protected $primaryKey = 'interesPacienteId';
    protected $allowedFields = ['interesPacienteId', 'interesId', 'pacienteId'];

    public function guardarPacInteres($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarPacInteres($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['interesPacienteId' => $id]);
    }

    public function actualizarPacInteres($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('interesPacienteId', $id);
        $update = $builder->update($data);
    }

    public function pacInteresJoin($pacienteId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_interes_paciente a');
        $builder->select('
        a.interesPacienteId, a.interesId, b.nombreInteres, a.pacienteId, d.nombres, d.primerApellido
        ');
        $builder->join('ex_intereses b','a.interesId = b.interesId');
        $builder->join('ex_pacientes c','a.pacienteId = c.pacienteId');
        $builder->join('pe_personas d','c.personaId = d.personaId');
        $builder->where('a.pacienteId', $pacienteId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}