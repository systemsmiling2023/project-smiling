<?php

namespace App\Models\Expediente;

use CodeIgniter\Model;

class PacienteMedioModel extends Model
{
    protected $table = 'co_paciente_medio';
    protected $primaryKey = 'pacMedId';
    protected $allowedFields = ['pacMedId', 'pacienteId', 'medioId','fechaRegistro'];

    public function guardarPacMedio($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function eliminarPacMedio($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['pacMedId' => $id]);
    }

    public function actualizarPacMedio($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('pacMedId', $id);
        $update = $builder->update($data);
    }

    public function pacMediosJoin($pacienteId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('co_paciente_medio a');
        $builder->select('
        a.pacMedId, a.pacienteId, a.medioId, a.fechaRegistro, c.nombres, c.primerApellido, d.medio
        ');
        $builder->join('ex_pacientes b','b.pacienteId = a.pacienteId');
        $builder->join('pe_personas c','b.personaId = c.personaId');
        $builder->join('co_medios_conocer d','d.medioId = a.medioId');
        $builder->where('a.pacienteId', $pacienteId);
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

}