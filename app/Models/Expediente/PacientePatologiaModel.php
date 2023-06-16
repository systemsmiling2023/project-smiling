<?php

namespace App\Models\Expediente;

use CodeIgniter\Model;

class PacientePatologiaModel extends Model
{
    protected $table = 'ex_patologias_paciente';
    protected $primaryKey = 'patologiaPacienteId';
    protected $allowedFields = ['patologiaPacienteId', 'patologiaId', 'pacienteId'];

    public function guardarPacPatologias($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarPacPatologias($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['patologiaPacienteId' => $id]);
    }

    public function actualizarPacPatologias($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('patologiaPacienteId', $id);
        $update = $builder->update($data);
    }

    public function pacPatologiaJoin($pacienteId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ex_patologias_paciente a');
        $builder->select('
        a.patologiaPacienteId, a.patologiaId, b.patologia, a.pacienteId, d.nombres, d.primerApellido
        ');
        $builder->join('ex_patologias b','a.patologiaId = b.patologiaId');
        $builder->join('ex_pacientes c','a.pacienteId = c.pacienteId');
        $builder->join('pe_personas d','c.personaId = d.personaId');
        $builder->where('a.pacienteId', $pacienteId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}