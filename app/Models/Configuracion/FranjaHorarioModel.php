<?php

namespace App\Models;

use CodeIgniter\Model;

class FranjaHorarioModel extends Model
{
    protected $table = 'ag_franja_horarios';
    protected $primaryKey = 'horarioId';
    protected $allowedFields = ['horarioId', 'diaSemana', 'horaInicio', 'horaFinal',
                                 'fechaRegistro','estado'];

    public function guardarFranja($data)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
    }

    public function consultar($dia,$hIni) {
        
        $query = $this->db->query("SELECT horarioId from ag_franja_horarios where diaSemana = '$dia' AND horaInicio = '$hIni'");
        return $query->getRow();
    }

    public function eliminarFranjaHorario($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $delete = $builder->delete(['horarioId' => $id]);
    }

    public function actualizarFranjaHorario($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where('horarioId', $id);
        $update = $builder->update($data);
    }


}